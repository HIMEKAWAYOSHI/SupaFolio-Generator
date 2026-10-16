
<style>
    .simple-portfolio {
        max-width: 900px;
        margin: 0 auto;
        padding: 40px;
        background: #ffffff;
        color: #333333;
        font-family: Arial, sans-serif;
        line-height: 1.7;
        box-sizing: border-box;
    }

    /* PERSONAL INFORMATION */
    .simple-header {
        display: flex;
        align-items: center;
        gap: 25px;
        padding-bottom: 25px;
        border-bottom: 2px solid #333333;
        margin-bottom: 30px;
    }

    .simple-profile {
        width: 130px;
        height: 130px;
        object-fit: cover;
        border-radius: 50%;
        flex-shrink: 0;
    }

    .simple-name {
        margin: 0 0 8px;
        font-size: 32px;
        color: #222222;
        overflow-wrap: anywhere;
    }

    .simple-contact {
        margin: 4px 0;
        color: #666666;
        font-size: 14px;
        overflow-wrap: anywhere;
    }

    /* SECTIONS */
    .simple-section {
        margin-top: 32px;
        padding-bottom: 24px;
        border-bottom: 1px solid #e5e5e5;
    }

    .simple-section h2 {
        font-size: 20px;
        color: #222222;
        padding-bottom: 8px;
        border-bottom: 1px solid #dddddd;
        margin-bottom: 15px;
    }

    .simple-item {
        margin-bottom: 24px;
        min-width: 0;
    }

    .simple-item h3 {
        margin: 0;
        font-size: 17px;
        color: #333333;
        overflow-wrap: anywhere;
    }

    .simple-muted {
        color: #777777;
        font-size: 14px;
        margin: 3px 0;
    }

    /* JUSTIFIED DESCRIPTIONS */
    .simple-description {
        max-width: 680px;
        width: 100%;
        text-align: left;
        overflow-wrap: anywhere;
        white-space: pre-line;
        line-height: 1.8;
        color: #444;
    }

    /* SKILLS */
    .simple-skills {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }

    .simple-skill {
        display: inline-block;
        border: 1px solid #cccccc;
        padding: 5px 12px;
        border-radius: 4px;
        font-size: 14px;
        overflow-wrap: anywhere;
    }

    /* PROJECT THUMBNAILS */
    .simple-project-image {
        display: block;
        width: 100%;
        max-width: 650px;
        height: 320px;
        object-fit: contain;
        object-position: left center;
        background: #f5f5f5;
        margin: 12px 0 18px;
        border: 1px solid #eeeeee;
        border-radius: 8px;
    }

    .simple-education-school {
    margin: 0 0 6px;
    font-size: 17px;
    font-weight: 700;
    color: #222;
    overflow-wrap: anywhere;
}

.simple-education-details {
    margin: 0;
    max-width: 680px;
    font-size: 14px;
    line-height: 1.7;
    color: #666;
    overflow-wrap: anywhere;
}

    /* BUTTONS: PROJECTS AND SOCIAL LINKS */
    .simple-button {
        display: inline-block;
        padding: 10px 18px;
        margin: 8px 6px 4px 0;
        background: #333333;
        color: #ffffff !important;
        border: 1px solid #333333;
        border-radius: 5px;
        text-decoration: none !important;
        font-size: 14px;
        font-weight: 600;
        line-height: 1.5;
        overflow-wrap: anywhere;
        transition: background 0.2s ease, color 0.2s ease;
    }

    .simple-button:hover {
        background: #ffffff;
        color: #333333 !important;
    }

    .simple-button:focus-visible {
        outline: 3px solid #888888;
        outline-offset: 3px;
    }

    .simple-social-links {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }

    .simple-social-links .simple-button {
        margin: 0;
    }





    /* MOBILE LAYOUT */
    @media (max-width: 600px) {
        .simple-portfolio {
            padding: 20px;
        }

        .simple-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .simple-name {
            font-size: 26px;
        }

        .simple-project-image {
            height: 240px;
        }
    }
</style>

<div class="simple-portfolio">

    {{-- PERSONAL INFORMATION --}}
    <header class="simple-header">

        @if ($portfolio->profile_picture)
            <img
                class="simple-profile"
                src="{{ $portfolio->profile_picture }}"
                alt="Profile picture of {{ $portfolio->full_name }}"
            >
        @endif

        <div>
            <h1 class="simple-name">
                {{ $portfolio->full_name }}
            </h1>

            @if ($portfolio->email)
                <p class="simple-contact">
                    {{ $portfolio->email }}
                </p>
            @endif

            @if ($portfolio->contact_number)
                <p class="simple-contact">
                    {{ $portfolio->contact_number }}
                </p>
            @endif

            @if ($portfolio->address)
                <p class="simple-contact">
                    {{ $portfolio->address }}
                </p>
            @endif
        </div>

    </header>

    {{-- ABOUT ME --}}
    @if ($portfolio->about_me)
        <section class="simple-section">
            <h2>About Me</h2>

            <p class="simple-description">{{ $portfolio->about_me }}</p>
        </section>
    @endif

    {{-- EDUCATION --}}
    @if ($portfolio->educations->isNotEmpty())
        <section class="simple-section">
            <h2>Education</h2>

            @foreach ($portfolio->educations as $edu)
                <div class="simple-item">

            <h3 class="simple-education-school">
                {{ $edu->school_name }}
            </h3>

             <p class="simple-education-details">
                  {{ $edu->education_level }}

                @if ($edu->degree)
                    · {{ $edu->degree }}
                @endif

                 @if ($edu->start_year || $edu->end_year)
                     · {{ $edu->start_year ?? '—' }}
                     - {{ $edu->end_year ?? 'Present' }}
                 @endif
                </p>

            </div>
            @endforeach
        </section>
    @endif

    {{-- SKILLS --}}
    @if ($portfolio->skills->isNotEmpty())
        <section class="simple-section">
            <h2>Skills</h2>

            <div class="simple-skills">
                @foreach ($portfolio->skills as $skill)
                    <span class="simple-skill">
                        {{ $skill->skill_name }}
                    </span>
                @endforeach
            </div>
        </section>
    @endif

    {{-- PROJECTS --}}
    @if ($portfolio->projects->isNotEmpty())
        <section class="simple-section">
            <h2>Projects</h2>

            @foreach ($portfolio->projects as $project)
                <article class="simple-item">

                    <h3>{{ $project->project_name }}</h3>

                    @if ($project->project_img)
                        <img
                            class="simple-project-image"
                            src="{{ $project->project_img }}"
                            alt="{{ $project->project_name }} thumbnail"
                            loading="lazy"
                        >
                    @endif

                    @if ($project->description)
                        <p class="simple-description">{{ $project->description }}</p>
                    @endif

                    @if ($project->project_link)
                        <a
                            class="simple-button"
                            href="{{ $project->project_link }}"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            View Project &rarr;
                        </a>
                    @endif

                </article>
            @endforeach
        </section>
    @endif

    {{-- WORK EXPERIENCE --}}
    @if ($portfolio->workExperiences->isNotEmpty())
        <section class="simple-section">
            <h2>Work Experience</h2>

            @foreach ($portfolio->workExperiences as $job)
                <div class="simple-item">

                    <h3>{{ $job->position }}</h3>

                    <p>{{ $job->company }}</p>

                    <p class="simple-muted">
                        {{ $job->start_date ?? 'Start date not specified' }}
                        &ndash;
                        {{ $job->end_date ?? 'Present' }}
                    </p>

                    @if ($job->description)
                        <p class="simple-description">{{ $job->description }}</p>
                    @endif

                </div>
            @endforeach
        </section>
    @endif

    {{-- SOCIAL MEDIA AND WEBSITE LINKS --}}
    @if ($portfolio->socialLinks->isNotEmpty())
        <section class="simple-section">
            <h2>Social Media &amp; Website Links</h2>

            <div class="simple-social-links">
                @foreach ($portfolio->socialLinks as $link)
                    @if (preg_match('/^https?:\/\//i', $link->url))
                        <a
                            class="simple-button"
                            href="{{ $link->url }}"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            {{ $link->platform }} &rarr;
                        </a>
                    @endif
                @endforeach
            </div>
        </section>
    @endif

</div>
