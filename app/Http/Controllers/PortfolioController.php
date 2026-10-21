<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Education;
use App\Models\Project;
use App\Models\Skill;
use App\Models\SocialLink;
use App\Models\WorkExperience;

use Illuminate\Http\Request;
use Illuminate\Http\Client\Pool;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;

class PortfolioController extends Controller
{
    // ---------- pages ----------

    public function index()
    {
        $portfolios = Auth::user()->portfolios()->latest()->get();

        return view('dashboard', compact('portfolios'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $data   = $this->validated($request);
        $fields = $this->portfolioFields($data);

        // upload the chosen pictures (all at the same time)
        $pictures = $this->uploadChosenPictures($request, $data['projects'] ?? []);

        if ($pictures === null) {
            return back()->withInput()->withErrors([
                'profile_picture' => 'A picture could not be uploaded. Please try again.',
            ]);
        }

        if ($pictures['profile']) {
            $fields['profile_picture'] = $pictures['profile'];
        }

        foreach ($pictures['projects'] as $i => $link) {
            $data['projects'][$i]['project_img'] = $link;
        }

        try {
            DB::transaction(function () use ($fields, $data) {
                $portfolio = Auth::user()->portfolios()->create($fields);
                $this->saveLists($portfolio, $data);
            });
        } catch (QueryException $e) {
            // the save failed, so remove the files that were just uploaded
            $this->deletePicturesLater($pictures['all']);

            return back()->withInput()->withErrors([
                //sa images 
                'general' => 'Something was entered twice or years, please check your inputs',
            ]);
        }

        return redirect()->route('dashboard')->with('success', 'Portfolio created.');
    }

    public function show($id)
    {
        $portfolio = Auth::user()->portfolios()
            ->with(['educations', 'skills', 'projects', 'socialLinks', 'workExperiences'])
            ->findOrFail($id);

        return view('show', compact('portfolio'));
    }

    public function edit($id)
    {
        $portfolio = Auth::user()->portfolios()
            ->with(['educations', 'skills', 'projects', 'socialLinks', 'workExperiences'])
            ->findOrFail($id);

        return view('edit', compact('portfolio'));
    }


    public function update(Request $request, $id)
    {  //kani na part kay mag updates sa inputs gikan sa edit
        $portfolio = Auth::user()->portfolios()->with('projects')->findOrFail($id);

        // every picture this portfolio has right now
        $oldLinks = $portfolio->projects->pluck('project_img')
            ->push($portfolio->profile_picture)
            ->filter()
            ->all();

        $data   = $this->validated($request);
        $fields = $this->portfolioFields($data);

        // upload the newly chosen pictures (all at the same time)
        $pictures = $this->uploadChosenPictures($request, $data['projects'] ?? []);

        if ($pictures === null) {
            return back()->withInput()->withErrors([
                'profile_picture' => 'A picture could not be uploaded. Please try again.',
            ]);
        }

        // a new profile picture replaces the old one, otherwise the saved one stays
        if ($pictures['profile']) {
            $fields['profile_picture'] = $pictures['profile'];
        }

        foreach ($pictures['projects'] as $i => $link) {
            $data['projects'][$i]['project_img'] = $link;
        }

        // every picture the portfolio will have after this save
        $newLinks = collect($data['projects'] ?? [])->pluck('project_img')
            ->push($fields['profile_picture'] ?? $portfolio->profile_picture)
            ->filter()
            ->all();

        try {
            DB::transaction(function () use ($portfolio, $fields, $data) {
                $portfolio->update($fields);

                // remove the old lists, then save the submitted ones again
                $portfolio->educations()->delete();
                $portfolio->skills()->delete();
                $portfolio->projects()->delete();
                $portfolio->socialLinks()->delete();
                $portfolio->workExperiences()->delete();

                $this->saveLists($portfolio, $data);
            });
        } catch (QueryException $e) {
            // the save failed, so remove the files that were just uploaded
            $this->deletePicturesLater($pictures['all']);

            return back()->withInput()->withErrors([
                'general' => 'Something was entered twice. Please check your inputs.',
            ]);
        }

        // the save worked, so remove the pictures that are no longer used
        $this->deletePicturesLater(array_diff($oldLinks, $newLinks));

        return redirect()->route('dashboard')->with('success', 'Portfolio updated.');
    }

    public function destroy($id)
    {
        $portfolio = Auth::user()->portfolios()->with('projects')->findOrFail($id);

        // collect the file links BEFORE the rows are deleted
        $links = $portfolio->projects->pluck('project_img')
            ->push($portfolio->profile_picture)
            ->filter()
            ->all();

        $portfolio->delete();   // the child rows go too (ON DELETE CASCADE)

        $this->deletePicturesLater($links);

        return redirect()->route('dashboard')->with('success', 'Portfolio deleted.');
    }

    // draws the REAL template with the unsaved form data (nothing is saved)
    public function preview(Request $request)
    {
        $template = in_array($request->input('template'), ['simple', 'modern', 'creative'])
            ? $request->input('template')
            : 'simple';

        $portfolio = new Portfolio($request->only([
            'title', 'full_name', 'email', 'contact_number', 'address', 'about_me',
        ]));
        $portfolio->template        = $template;
        $portfolio->profile_picture = $request->input('photo_url');

        $skills = collect($request->input('skills', []))
            ->filter()
            ->map(fn ($name) => new Skill(['skill_name' => $name]))
            ->values();

        $portfolio->setRelation('skills', $skills);
        $portfolio->setRelation('educations',      $this->previewRows($request, 'educations', 'school_name', Education::class));
        $portfolio->setRelation('projects',        $this->previewRows($request, 'projects', 'project_name', Project::class));
        $portfolio->setRelation('socialLinks',     $this->previewRows($request, 'social_links', 'platform', SocialLink::class));
        $portfolio->setRelation('workExperiences', $this->previewRows($request, 'work_experiences', 'company', WorkExperience::class));

        return view('preview-show', compact('portfolio'));
    }

    private function previewRows(Request $request, string $input, string $key, string $model)
    {
        return collect($this->filledRows($request->input($input, []), $key))
            ->map(fn ($row) => new $model($row))
            ->values();
    }

    // ---------- validation ----------

    private function validated(Request $request): array
    {
        // drop blank rows, so unused "Add another" rows don't fail validation
        $request->merge([
            'skills'           => array_values(array_filter((array) $request->input('skills', []))),
            'educations'       => $this->filledRows($request->input('educations', []), 'school_name'),
            'projects'         => $this->filledRows($request->input('projects', []), 'project_name'),
            'social_links'     => $this->filledRows($request->input('social_links', []), 'platform'),
            'work_experiences' => $this->filledRows($request->input('work_experiences', []), 'company'),
        ]);

        
       $educations = $request->input('educations', []);

$seenSchools = [];
$errors = [];

foreach ($educations as $index => $education) {
    $level = strtolower(trim($education['education_level'] ?? ''));
    $school = strtolower(trim($education['school_name'] ?? ''));

    if ($level === '' || $school === '') {
        continue;
    }

    $key = $level . '|' . $school;

    if (isset($seenSchools[$key])) {
        $errors["educations.$index.school_name"] =
            'This school has already been entered for this education level.';
    } else {
        $seenSchools[$key] = true;
    }
}

if (!empty($errors)) {
    throw ValidationException::withMessages($errors);
}


        $data = $request->validate([
            'title'           => 'required|string|max:255',
            'full_name'       => 'required|string|max:255|regex:/^[\pL\pM\s.\'-]+$/u',
            'email'           => 'required|email|max:255',
            'contact_number'  => 'nullable|regex:/^[0-9]+$/|max:15',
            'address'         => 'nullable|string|max:255',
            'about_me'        => 'nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'template'        => 'required|in:simple,modern,creative',

            'skills.*' => 'string|max:255|distinct:ignore_case',

            'educations.*.education_level' => 'required|in:Elementary,High School,Senior High School,Vocational,College,Graduate',
            'educations.*.school_name'     => 'required|string|max:255',
            'educations.*.degree'          => 'nullable|string|max:255',
            'educations.*.start_year'      => 'nullable|integer|min:1',
            'educations.*.end_year'        => 'nullable|integer|min:1|after_or_equal:educations.*.start_year',

            'projects.*.project_name' => 'required|string|max:255',
            'projects.*.description'  => 'nullable|string',
            'projects.*.project_link' => 'nullable|url|max:500|distinct:ignore_case',
            'projects.*.project_img'  => 'nullable|url|max:500',
            'project_images.*'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'social_links.*.platform' => 'required|string|max:100',
            'social_links.*.url'      => 'required|url|max:500|distinct:ignore_case',

            'work_experiences.*.company'     => 'required|string|max:255',
            'work_experiences.*.position'    => 'required|string|max:255',
            'work_experiences.*.start_date'  => 'required|date',
            'work_experiences.*.end_date'    => 'nullable|date|after_or_equal:work_experiences.*.start_date',
            'work_experiences.*.description' => 'nullable|string',
        ], 
        [//error messages
            'full_name.regex' => 'Full name must not contain numbers.',
            'contact_number.regex' => 'Contact number must contain numbers only.',
            'contact_number.max' => 'Contact number must not exceed 15 digits.',
        
            'projects.*.project_link.distinct' => 'Project link been used twice',
            'social_links.*.url.distinct' => 'Social link been used twice',
            'social_links.*.url.required' => 'Social Link is required',
            'work_experiences.*.position.required' => 'Work Position required.',
            'work_experiences.*.end_date.after_or_equal' => "The job year's input is invalid",
            'educations.*.end_year.after_or_equal' => "The education year's input is invalid.",
            'skills.*.distinct' => "Skills has duplicate value",
        ]);

    

        return $data;
}

    // keeps only the rows where the main field was filled in (the row numbers are kept)
    private function filledRows(mixed $rows, string $key): array
    {
        if (!is_array($rows)) {
            return [];
        }

        return array_filter($rows, fn ($row) => !empty($row[$key]));
    }

    // the portfolio's own columns (the picture is handled separately)
    private function portfolioFields(array $data): array
    {
        return Arr::only($data, ['title', 'full_name', 'email', 'contact_number',
                                 'address', 'about_me', 'template']);
    }

    // ---------- saving the lists (one INSERT per table) ----------

    private function saveLists($portfolio, array $data): void
    {
        $id = $portfolio->id;

        // skills are plain text, so turn each name into a row first
        $skills = array_map(fn ($name) => ['skill_name' => $name], $data['skills'] ?? []);

        $this->bulkInsert(Skill::class, $id, $skills, ['skill_name']);
        $this->bulkInsert(Education::class, $id, $data['educations'] ?? [],
            ['education_level', 'school_name', 'degree', 'start_year', 'end_year']);
        $this->bulkInsert(Project::class, $id, $data['projects'] ?? [],
            ['project_name', 'description', 'project_link', 'project_img']);
        $this->bulkInsert(SocialLink::class, $id, $data['social_links'] ?? [],
            ['platform', 'url']);
        $this->bulkInsert(WorkExperience::class, $id, $data['work_experiences'] ?? [],
            ['company', 'position', 'start_date', 'end_date', 'description']);
    }

    // inserts all the rows of one table with a single query
    private function bulkInsert(string $model, int $portfolioId, array $rows, array $columns): void
    {
        $records = [];

        foreach ($rows as $row) {
            $record = ['portfolio_id' => $portfolioId];

            foreach ($columns as $column) {
                $record[$column] = $row[$column] ?? null;   // every row needs the same columns
            }

            $records[] = $record;
        }

        if ($records) {
            $model::insert($records);
        }
    }

    // ---------- pictures (Supabase Storage) ----------

    // uploads the profile picture and the project thumbnails that were chosen.
    // Returns null if any upload failed, otherwise the new links.
    private function uploadChosenPictures(Request $request, array $projects): ?array
    {
        $files = [];

        if ($request->hasFile('profile_picture')) {
            $files['profile'] = $request->file('profile_picture');
        }

        // only the project rows that were kept (a project's file uses the same row number)
        foreach (array_keys($projects) as $i) {
            if ($request->hasFile("project_images.$i")) {
                $files["project-$i"] = $request->file("project_images.$i");
            }
        }

        $links = $this->uploadFiles($files);

        if ($links === null) {
            return null;
        }

        $result = [
            'profile'  => $links['profile'] ?? null,
            'projects' => [],
            'all'      => array_values($links),
        ];

        foreach ($links as $name => $link) {
            if (str_starts_with($name, 'project-')) {
                $result['projects'][substr($name, 8)] = $link;   // "project-3" becomes row 3
            }
        }

        return $result;
    }

    // uploads all the files at the same time. Returns [name => public link], or null if any failed.
    private function uploadFiles(array $files): ?array
    {
        if (!$files) {
            return [];
        }

        $url    = config('services.supabase.url');
        $key    = config('services.supabase.key');
        $bucket = config('services.supabase.bucket');
        $folder = Auth::id();   // every account uploads into its own folder

        $paths = [];
        foreach ($files as $name => $file) {
            $paths[$name] = $folder . '/' . Str::uuid() . '.' . $file->extension();
        }

        try {
            $responses = Http::pool(function (Pool $pool) use ($files, $paths, $url, $key, $bucket) {
                foreach ($files as $name => $file) {
                    $pool->as($name)
                        ->timeout(20)
                        ->withHeaders(['apikey' => $key])
                        ->withToken($key)
                        ->withBody(file_get_contents($file->getRealPath()), $file->getMimeType())
                        ->post("$url/storage/v1/object/$bucket/{$paths[$name]}");
                }
            });
        } catch (\Throwable $e) {
            Log::error('Supabase upload error: ' . $e->getMessage());
            return null;
        }

        $links  = [];
        $failed = false;

        foreach ($paths as $name => $path) {
            $response = $responses[$name] ?? null;

            if ($response instanceof Response && $response->successful()) {
                $links[$name] = "$url/storage/v1/object/public/$bucket/$path";
            } else {
                $failed = true;
                Log::error('Supabase upload failed for ' . $name . ': '
                    . ($response instanceof Response ? $response->body() : 'no response'));
            }
        }

        if ($failed) {
            $this->deletePicturesLater(array_values($links));   // remove the ones that did upload
            return null;
        }

        return $links;
    }

    // removes files from the bucket AFTER the response was sent, so the user doesn't wait for it
    private function deletePicturesLater(array $links): void
    {
        $paths = $this->bucketPaths($links);

        if ($paths) {
            app()->terminating(fn () => $this->deletePaths($paths));
        }
    }

    // turns saved links into bucket paths, keeping only files in THIS account's folder
    private function bucketPaths(array $links): array
    {
        $prefix = config('services.supabase.url') . '/storage/v1/object/public/'
                . config('services.supabase.bucket') . '/';
        $own    = $prefix . Auth::id() . '/';

        $paths = [];
        foreach (array_unique(array_filter($links)) as $link) {
            if (str_starts_with($link, $own)) {
                $paths[] = substr($link, strlen($prefix));
            }
        }

        return $paths;
    }

    // deletes many files with ONE call
    private function deletePaths(array $paths): void
    {
        $url    = config('services.supabase.url');
        $key    = config('services.supabase.key');
        $bucket = config('services.supabase.bucket');

        try {
            Http::timeout(20)
                ->withHeaders(['apikey' => $key])
                ->withToken($key)
                ->delete("$url/storage/v1/object/$bucket", ['prefixes' => $paths]);
        } catch (\Throwable $e) {
            Log::error('Supabase delete error: ' . $e->getMessage());
        }
    }
}