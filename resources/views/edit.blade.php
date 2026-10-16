
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Portfolio | SupaFolio</title>

    <style>
        :root {
            --background: #f7f3ed;
            --surface: #ffffff;
            --surface-soft: #fcfaf7;
            --text: #382f29;
            --muted: #84786e;
            --border: #e8dfd5;
            --brown: #705647;
            --brown-dark: #49382e;
            --green: #3d6349;
            --green-light: #edf4eb;
            --red: #b42318;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            padding: 35px 24px 60px;
            background: var(--background);
            color: var(--text);
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
            line-height: 1.6;
        }

        .page-container {
            width: 100%;
            max-width: 1050px;
            margin: 0 auto;
        }

        /* Page heading */

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
            margin-bottom: 28px;
        }

        .brand-label {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            margin-bottom: 10px;
            color: var(--green);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .brand-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--green);
        }

        h1 {
            margin: 0 0 8px;
            color: var(--brown-dark);
            font-size: clamp(27px, 4vw, 35px);
            line-height: 1.25;
            letter-spacing: -1px;
        }

        .page-description {
            max-width: 620px;
            margin: 0;
            color: var(--muted);
            font-size: 14px;
        }


    
        /* Validation */

        .error-message {
            margin-bottom: 12px;
            padding: 17px 20px;
            border: 1px solid #f0c9c4;
            border-radius: 12px;
            background: #fff0ee;
            color: var(--red);
        }

        .error-message strong {
            display: block;
            margin-bottom: 5px;
        }

        .error-message ul {
            margin: 7px 0 0;
            padding-left: 22px;
        }

        .error-count {
            margin: 0 0 20px;
            color: var(--muted);
            font-size: 12px;
        }

        /* Main form */

        #portfolio-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-section {
            min-width: 0;
            margin: 0;
            padding: 25px;
            border: 1px solid var(--border);
            border-radius: 16px;
            background: var(--surface);
            box-shadow: 0 5px 18px rgba(65, 47, 32, 0.035);
        }

        .section-heading {
            display: flex;
            align-items: flex-start;
            gap: 13px;
            margin-bottom: 23px;
            padding-bottom: 16px;
            border-bottom: 1px solid #f0e9e1;
        }

        .section-number {
            display: flex;
            flex-shrink: 0;
            align-items: center;
            justify-content: center;
            width: 37px;
            height: 37px;
            border-radius: 10px;
            background: #f2ebe3;
            color: var(--brown);
            font-size: 13px;
            font-weight: 700;
        }

        .section-heading h2 {
            margin: 0 0 3px;
            color: var(--brown-dark);
            font-size: 19px;
            line-height: 1.4;
            letter-spacing: -0.3px;
        }

        .section-heading p {
            margin: 0;
            color: var(--muted);
            font-size: 12px;
        }

        /* Personal information */

        .personal-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        .field {
            min-width: 0;
            margin-bottom: 18px;
        }

        .personal-grid .field {
            margin-bottom: 0;
        }

        .field.full-width {
            grid-column: 1 / -1;
        }

        label {
            display: block;
            margin-bottom: 7px;
            color: #51443a;
            font-size: 13px;
            font-weight: 600;
        }

        .optional {
            color: #998d82;
            font-size: 11px;
            font-weight: 400;
        }

        input:not([type="radio"]):not([type="checkbox"]),
        select,
        textarea {
            display: block;
            width: 100%;
            min-width: 0;
            max-width: 100%;
            padding: 11px 13px;
            border: 1px solid #ded5cb;
            border-radius: 9px;
            background: #fffdfb;
            color: var(--text);
            font-family: inherit;
            font-size: 13px;
            line-height: 1.5;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        input::placeholder,
        textarea::placeholder {
            color: #a69a90;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #8ca48a;
            box-shadow: 0 0 0 3px rgba(89, 125, 95, 0.12);
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        .about-textarea {
            min-height: 130px;
        }

        input[type="file"] {
            padding: 8px !important;
            background: #faf8f5 !important;
            font-size: 12px !important;
            cursor: pointer;
        }

        input[type="file"]::file-selector-button {
            margin-right: 10px;
            padding: 7px 10px;
            border: 0;
            border-radius: 6px;
            background: #eee5da;
            color: var(--brown-dark);
            font-family: inherit;
            font-size: 12px;
            cursor: pointer;
        }

        .field-help {
            margin: 6px 0 0;
            color: var(--muted);
            font-size: 11px;
        }

        .current-photo {
            display: block;
            width: 120px;
            height: 120px;
            margin: 8px 0 13px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: var(--surface-soft);
            object-fit: cover;
        }

        /* Repeated rows */

        .repeated-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-bottom: 15px;
        }

        .repeated-row {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 13px;
            align-items: start;
            min-width: 0;
            margin: 0;
            padding: 18px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: var(--surface-soft);
        }

        .repeated-row > input,
        .repeated-row > select,
        .repeated-row > textarea {
            min-width: 0;
        }

        .repeated-row > textarea {
            grid-column: 1 / -1;
        }

        .repeated-row > label {
            min-width: 0;
            margin: 0;
        }

        .repeated-row > label input {
            margin-top: 5px;
        }

        .repeated-row > button {
            justify-self: start;
            align-self: center;
        }

        .project-image-area {
            display: flex;
            flex-direction: column;
            gap: 8px;
            min-width: 0;
        }

        .project-image-area label {
            margin: 0;
        }

        .current-project-photo {
            width: 100%;
            max-width: 150px;
            max-height: 110px;
            border: 1px solid var(--border);
            border-radius: 8px;
            background: white;
            object-fit: cover;
        }

        /* Buttons */

        button,
        .link-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 10px 15px;
            border: 1px solid var(--border);
            border-radius: 9px;
            background: white;
            color: var(--brown);
            font-family: inherit;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            transition: background 0.2s, border-color 0.2s, transform 0.2s;
        }

        button:hover,
        .link-button:hover {
            background: #f3eee8;
        }

        .add-button {
            border-color: #dbe6d7;
            background: var(--green-light);
            color: var(--green);
        }

        .add-button:hover {
            border-color: #c7d8c3;
            background: #dfeadb;
        }

        .remove-button {
            padding: 8px 11px;
            border-color: #f0d8d2;
            background: #fff3f0;
            color: #a34439;
        }

        .remove-button:hover {
            background: #ffe5df;
        }

        /* Template selection */

        .template-options {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 14px;
        }

        .template-option {
            display: flex;
            flex-direction: row;
            align-items: flex-start;
            gap: 12px;
            min-width: 0;
            margin: 0;
            padding: 20px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: var(--surface-soft);
            cursor: pointer;
            transition: border-color 0.2s, background 0.2s, box-shadow 0.2s;
        }

        .template-option:hover {
            border-color: #bdcdb8;
            background: #f7faf5;
        }

        .template-option:has(input:checked) {
            border-color: var(--green);
            background: var(--green-light);
            box-shadow: 0 0 0 2px rgba(61, 99, 73, 0.08);
        }

        .template-option input[type="radio"] {
            flex-shrink: 0;
            width: 17px;
            height: 17px;
            margin: 3px 0 0;
            accent-color: var(--green);
            cursor: pointer;
        }

        .template-option-content {
            display: flex;
            flex-direction: column;
            gap: 6px;
            min-width: 0;
        }

        .template-name {
            color: var(--brown-dark);
            font-size: 14px;
            font-weight: 700;
        }

        .template-description {
            color: var(--muted);
            font-size: 12px;
            font-weight: 400;
            line-height: 1.6;
        }

        /* Live preview */

        .preview-note {
            margin: -8px 0 16px;
            color: var(--muted);
            font-size: 12px;
        }

        .preview-status {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 12px;
            color: var(--muted);
            font-size: 12px;
        }

        .preview-status p {
            margin: 0;
        }

        .status-dot {
            width: 7px;
            height: 7px;
            flex-shrink: 0;
            border-radius: 50%;
            background: #8da58b;
        }

        #preview-frame {
            display: block;
            width: 100%;
            min-height: 500px;
            height: 500px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: white;
        }

        /* Bottom actions */

        .form-actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            padding: 5px 0 15px;
        }

        .actions-note {
            margin: 0;
            color: var(--muted);
            font-size: 12px;
        }

        .actions-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .cancel-button {
            padding: 12px 19px;
        }

        .save-button {
            min-width: 155px;
            padding: 12px 20px;
            border-color: var(--green);
            background: var(--green);
            color: white;
            font-size: 13px;
        }

        .save-button:hover {
            transform: translateY(-1px);
            border-color: #284936;
            background: #284936;
        }

        /* Responsive */

        @media (max-width: 800px) {
            .template-options {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 700px) {
            body {
                padding: 24px 14px 40px;
            }

            .page-header {
                flex-direction: column;
                gap: 12px;
            }

            .form-section {
                padding: 19px;
            }

            .section-heading h2 {
                font-size: 17px;
            }

            .personal-grid {
                grid-template-columns: 1fr;
                gap: 17px;
            }

            .field.full-width {
                grid-column: auto;
            }

            .repeated-row {
                grid-template-columns: 1fr;
                padding: 14px;
            }

            .repeated-row > textarea {
                grid-column: auto;
            }

            .form-actions {
                align-items: flex-start;
                flex-direction: column;
            }

            .actions-buttons {
                width: 100%;
            }

            .actions-buttons .link-button,
            .actions-buttons .save-button {
                flex: 1;
            }

            #preview-frame {
                min-height: 350px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            html {
                scroll-behavior: auto;
            }

            *,
            *::before,
            *::after {
                transition-duration: 0.01ms !important;
            }
        }
    </style>
</head>

<body>
<div class="page-container">

    @php
        $levels = [
            'Elementary',
            'High School',
            'Senior High School',
            'Vocational',
            'College',
            'Graduate'
        ];

        $chosen = old('template', $portfolio->template);

        $edu = old(
            'educations',
            $portfolio->educations->toArray()
        );

        $skl = old(
            'skills',
            $portfolio->skills->pluck('skill_name')->toArray()
        );

        $prj = old(
            'projects',
            $portfolio->projects->toArray()
        );

        $wrk = old(
            'work_experiences',
            $portfolio->workExperiences->toArray()
        );

        $soc = old(
            'social_links',
            $portfolio->socialLinks->toArray()
        );

        $photo = $portfolio->profile_picture;

        $photoUrl = $photo
            ? (
                filter_var($photo, FILTER_VALIDATE_URL)
                    ? $photo
                    : asset('storage/' . $photo)
            )
            : null;
    @endphp

    <header class="page-header">
        <div>
            <div class="brand-label">
                <span class="brand-dot"></span>
                <p>SupaFolio</p>
            </div>

            <h1>Edit Your Portfolio</h1>

            <p class="page-description">
                Update your personal information, education, skills,
                projects, and experiences to keep your portfolio up to date.
            </p>
        </div>


    </header>



    @if ($errors->any())
        <div class="error-message">
            <strong>Please fix these issues before saving:</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <p class="error-count">
        Errors found: {{ $errors->count() }}
    </p>

    <form
        id="portfolio-form"
        action="{{ route('portfolios.update', $portfolio->id) }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf
        @method('PUT')

        <!-- PERSONAL INFORMATION -->
        <section class="form-section">
            <div class="section-heading">
                <div class="section-number">01</div>
                <div>
                    <h2>Personal Information</h2>
                    <p>Introduce yourself and provide your contact details.</p>
                </div>
            </div>

            <div class="personal-grid">
                <div class="field">
                    <label for="title">Portfolio Title</label>
                    <input
                        id="title"
                        type="text"
                        name="title"
                        placeholder="e.g. My Personal Portfolio"
                        value="{{ old('title', $portfolio->title) }}"
                    >
                </div>

                <div class="field">
                    <label for="full_name">Full Name</label>
                    <input
                        id="full_name"
                        type="text"
                        name="full_name"
                        placeholder="Enter your full name"
                        value="{{ old('full_name', $portfolio->full_name) }}"
                    >
                </div>

                <div class="field">
                    <label for="email">Email</label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        placeholder="you@example.com"
                        value="{{ old('email', $portfolio->email) }}"
                    >
                </div>

                <div class="field">
                    <label for="contact_number">Contact Number</label>
                    <input
                        id="contact_number"
                        type="text"
                        name="contact_number"
                        placeholder="Enter your contact number"
                        value="{{ old('contact_number', $portfolio->contact_number) }}"
                    >
                </div>

                <div class="field full-width">
                    <label for="address">Address</label>
                    <input
                        id="address"
                        type="text"
                        name="address"
                        placeholder="City, province, or address"
                        value="{{ old('address', $portfolio->address) }}"
                    >
                </div>

                <div class="field full-width">
                    <label for="about_me">About Me</label>
                    <textarea
                        id="about_me"
                        name="about_me"
                        class="about-textarea"
                        rows="4"
                        placeholder="Write a short introduction about yourself, your interests, and your goals."
                    >{{ old('about_me', $portfolio->about_me) }}</textarea>
                </div>

                <div class="field full-width">
                    <label for="profile_picture">
                        Profile Picture
                        <span class="optional">(Optional)</span>
                    </label>

                    @if ($photoUrl)
                        <img
                            class="current-photo"
                            src="{{ $photoUrl }}"
                            alt="Current profile picture"
                        >
                    @endif

                    <input
                        id="profile_picture"
                        type="file"
                        name="profile_picture"
                        accept="image/jpeg,image/png,image/webp"
                    >

                    <p class="field-help">
                        Leave this empty to keep your current picture.
                        JPG, PNG, or WEBP. Maximum file size: 2 MB.
                    </p>
                </div>
            </div>
        </section>

        <!-- EDUCATION -->
        <section class="form-section">
            <div class="section-heading">
                <div class="section-number">02</div>
                <div>
                    <h2>Education</h2>
                    <p>Add your schools, degrees, and study years.</p>
                </div>
            </div>

            <div id="education-list" class="repeated-list">
                @foreach ($edu as $i => $row)
                    <div class="repeated-row">
                        <select name="educations[{{ $i }}][education_level]">
                            @foreach ($levels as $level)
                                <option
                                    value="{{ $level }}"
                                    {{ ($row['education_level'] ?? 'College') === $level ? 'selected' : '' }}
                                >
                                    {{ $level }}
                                </option>
                            @endforeach
                        </select>

                        <input
                            type="text"
                            name="educations[{{ $i }}][school_name]"
                            value="{{ $row['school_name'] ?? '' }}"
                            placeholder="School name"
                        >

                        <input
                            type="text"
                            name="educations[{{ $i }}][degree]"
                            value="{{ $row['degree'] ?? '' }}"
                            placeholder="Degree (optional)"
                        >

                        <input
                            type="number"
                            name="educations[{{ $i }}][start_year]"
                            value="{{ $row['start_year'] ?? '' }}"
                            placeholder="Start year"
                        >

                        <input
                            type="number"
                            name="educations[{{ $i }}][end_year]"
                            value="{{ $row['end_year'] ?? '' }}"
                            placeholder="End year"
                        >

                        <button
                            class="remove-button"
                            type="button"
                            onclick="this.parentElement.remove()"
                        >
                            Remove
                        </button>
                    </div>
                @endforeach
            </div>

            <button
                class="add-button"
                type="button"
                onclick="addRow('education-list', 'education-template')"
            >
                + Add Education
            </button>
        </section>

        <!-- SKILLS -->
        <section class="form-section">
            <div class="section-heading">
                <div class="section-number">03</div>
                <div>
                    <h2>Skills</h2>
                    <p>Show the technical and personal skills you have.</p>
                </div>
            </div>

            <div id="skills-list" class="repeated-list">
                @foreach ($skl as $name)
                    <div class="repeated-row">
                        <input
                            type="text"
                            name="skills[]"
                            value="{{ $name }}"
                            placeholder="e.g. PHP, JavaScript, SQL"
                        >

                        <button
                            class="remove-button"
                            type="button"
                            onclick="this.parentElement.remove()"
                        >
                            Remove
                        </button>
                    </div>
                @endforeach
            </div>

            <button
                class="add-button"
                type="button"
                onclick="addRow('skills-list', 'skills-template')"
            >
                + Add Skill
            </button>
        </section>

        <!-- PROJECTS -->
        <section class="form-section">
            <div class="section-heading">
                <div class="section-number">04</div>
                <div>
                    <h2>Projects</h2>
                    <p>Showcase projects you have created or worked on.</p>
                </div>
            </div>

            <div id="projects-list" class="repeated-list">
                @foreach ($prj as $i => $row)
                    <div class="repeated-row">
                        <input
                            type="text"
                            name="projects[{{ $i }}][project_name]"
                            value="{{ $row['project_name'] ?? '' }}"
                            placeholder="Project name"
                        >

                        <input
                            type="url"
                            name="projects[{{ $i }}][project_link]"
                            value="{{ $row['project_link'] ?? '' }}"
                            placeholder="Project link (optional)"
                        >

                        <div class="project-image-area">
                            <label>
                                Project Image
                                <span class="optional">(Optional)</span>
                            </label>

                            <input
                                type="hidden"
                                name="projects[{{ $i }}][project_img]"
                                value="{{ $row['project_img'] ?? '' }}"
                            >

                            @if (!empty($row['project_img']))
                                <img
                                    class="current-project-photo"
                                    src="{{ $row['project_img'] }}"
                                    alt="Current project thumbnail"
                                >
                            @endif

                            <input
                                type="file"
                                name="project_images[{{ $i }}]"
                                accept="image/jpeg,image/png,image/webp"
                            >

                            <p class="field-help">
                                Choose a new image to replace the current one.
                            </p>
                        </div>

                        <textarea
                            name="projects[{{ $i }}][description]"
                            rows="3"
                            placeholder="Describe your project"
                        >{{ $row['description'] ?? '' }}</textarea>

                        <button
                            class="remove-button"
                            type="button"
                            onclick="this.parentElement.remove()"
                        >
                            Remove
                        </button>
                    </div>
                @endforeach
            </div>

            <button
                class="add-button"
                type="button"
                onclick="addRow('projects-list', 'projects-template')"
            >
                + Add Project
            </button>
        </section>

        <!-- WORK EXPERIENCE -->
        <section class="form-section">
            <div class="section-heading">
                <div class="section-number">05</div>
                <div>
                    <h2>Work Experience</h2>
                    <p>Add previous jobs, internships, or relevant experience.</p>
                </div>
            </div>

            <div id="work-list" class="repeated-list">
                @foreach ($wrk as $i => $row)
                    <div class="repeated-row">
                        <input
                            type="text"
                            name="work_experiences[{{ $i }}][company]"
                            value="{{ $row['company'] ?? '' }}"
                            placeholder="Company"
                        >

                        <input
                            type="text"
                            name="work_experiences[{{ $i }}][position]"
                            value="{{ $row['position'] ?? '' }}"
                            placeholder="Position or job title"
                        >

                        <label>
                            Start Date
                            <input
                                type="date"
                                name="work_experiences[{{ $i }}][start_date]"
                                value="{{ isset($row['start_date']) ? substr((string) $row['start_date'], 0, 10) : '' }}"
                            >
                        </label>

                        <label>
                            End Date
                            <input
                                type="date"
                                name="work_experiences[{{ $i }}][end_date]"
                                value="{{ isset($row['end_date']) ? substr((string) $row['end_date'], 0, 10) : '' }}"
                            >
                        </label>

                        <textarea
                            name="work_experiences[{{ $i }}][description]"
                            rows="3"
                            placeholder="Describe your responsibilities"
                        >{{ $row['description'] ?? '' }}</textarea>

                        <button
                            class="remove-button"
                            type="button"
                            onclick="this.parentElement.remove()"
                        >
                            Remove
                        </button>
                    </div>
                @endforeach
            </div>

            <button
                class="add-button"
                type="button"
                onclick="addRow('work-list', 'work-template')"
            >
                + Add Work Experience
            </button>
        </section>

        <!-- SOCIAL LINKS -->
        <section class="form-section">
            <div class="section-heading">
                <div class="section-number">06</div>
                <div>
                    <h2>Social Media / Website Links</h2>
                    <p>Link your GitHub, LinkedIn, personal website, or other profiles.</p>
                </div>
            </div>

            <div id="social-list" class="repeated-list">
                @foreach ($soc as $i => $row)
                    <div class="repeated-row">
                        <input
                            type="text"
                            name="social_links[{{ $i }}][platform]"
                            value="{{ $row['platform'] ?? '' }}"
                            placeholder="Platform (e.g. GitHub)"
                        >

                        <input
                            type="url"
                            name="social_links[{{ $i }}][url]"
                            value="{{ $row['url'] ?? '' }}"
                            placeholder="https://example.com"
                        >

                        <button
                            class="remove-button"
                            type="button"
                            onclick="this.parentElement.remove()"
                        >
                            Remove
                        </button>
                    </div>
                @endforeach
            </div>

            <button
                class="add-button"
                type="button"
                onclick="addRow('social-list', 'social-template')"
            >
                + Add Link
            </button>
        </section>

        <!-- TEMPLATE SELECTION -->
        <section class="form-section">
            <div class="section-heading">
                <div class="section-number">07</div>
                <div>
                    <h2>Choose a Template</h2>
                    <p>Select the design that best represents your style.</p>
                </div>
            </div>

            <div class="template-options">
                <label class="template-option">
                    <input
                        type="radio"
                        name="template"
                        value="simple"
                        {{ $chosen === 'simple' ? 'checked' : '' }}
                    >

                    <div class="template-option-content">
                        <span class="template-name">Simple</span>
                        <span class="template-description">
                            A clean and professional layout that keeps your
                            information easy to read.
                        </span>
                    </div>
                </label>

                <label class="template-option">
                    <input
                        type="radio"
                        name="template"
                        value="modern"
                        {{ $chosen === 'modern' ? 'checked' : '' }}
                    >

                    <div class="template-option-content">
                        <span class="template-name">Modern</span>
                        <span class="template-description">
                            A stylish layout with organized sections and
                            project cards.
                        </span>
                    </div>
                </label>

                <label class="template-option">
                    <input
                        type="radio"
                        name="template"
                        value="creative"
                        {{ $chosen === 'creative' ? 'checked' : '' }}
                    >

                    <div class="template-option-content">
                        <span class="template-name">Creative</span>
                        <span class="template-description">
                            An expressive design with a distinctive visual style.
                        </span>
                    </div>
                </label>
            </div>
        </section>

        <!-- LIVE PREVIEW -->
        <section class="form-section">
            <div class="section-heading">
                <div class="section-number">08</div>
                <div>
                    <h2>Live Preview</h2>
                    <p>See how your portfolio looks as you update the form.</p>
                </div>
            </div>

            <p class="preview-note">
                Your preview updates automatically. Your changes are not saved
                until you press Save Changes.
            </p>

            <div class="preview-status">
                <span class="status-dot"></span>
                <p>Please wait to render update changes </p>
            </div>

            <iframe
                id="preview-frame"
                title="Portfolio preview"
            ></iframe>
        </section>

        <!-- FORM ACTIONS -->
        <div class="form-actions">
            <p class="actions-note">
                Review your changes before saving.
            </p>

            <div class="actions-buttons">
                <a
                    class="link-button cancel-button"
                    href="{{ route('dashboard') }}"
                >
                    Cancel
                </a>

                <button
                    class="save-button"
                    type="submit"
                >
                    Save Changes →
                </button>
            </div>
        </div>
    </form>

    <!-- EDUCATION TEMPLATE -->
    <template id="education-template">
        <div class="repeated-row">
            <select name="educations[__I__][education_level]">
                @foreach ($levels as $level)
                    <option
                        value="{{ $level }}"
                        {{ $level === 'College' ? 'selected' : '' }}
                    >
                        {{ $level }}
                    </option>
                @endforeach
            </select>

            <input
                type="text"
                name="educations[__I__][school_name]"
                placeholder="School name"
            >

            <input
                type="text"
                name="educations[__I__][degree]"
                placeholder="Degree (optional)"
            >

            <input
                type="number"
                name="educations[__I__][start_year]"
                placeholder="Start year"
            >

            <input
                type="number"
                name="educations[__I__][end_year]"
                placeholder="End year"
            >

            <button
                class="remove-button"
                type="button"
                onclick="this.parentElement.remove()"
            >
                Remove
            </button>
        </div>
    </template>

    <!-- SKILLS TEMPLATE -->
    <template id="skills-template">
        <div class="repeated-row">
            <input
                type="text"
                name="skills[]"
                placeholder="e.g. PHP, JavaScript, SQL"
            >

            <button
                class="remove-button"
                type="button"
                onclick="this.parentElement.remove()"
            >
                Remove
            </button>
        </div>
    </template>

    <!-- PROJECTS TEMPLATE -->
    <template id="projects-template">
        <div class="repeated-row">
            <input
                type="text"
                name="projects[__I__][project_name]"
                placeholder="Project name"
            >

            <input
                type="url"
                name="projects[__I__][project_link]"
                placeholder="Project link (optional)"
            >

            <div class="project-image-area">
                <label>
                    Project Image
                    <span class="optional">(Optional)</span>
                </label>

                <input
                    type="hidden"
                    name="projects[__I__][project_img]"
                    value=""
                >

                <input
                    type="file"
                    name="project_images[__I__]"
                    accept="image/jpeg,image/png,image/webp"
                >
            </div>

            <textarea
                name="projects[__I__][description]"
                rows="3"
                placeholder="Describe your project"
            ></textarea>

            <button
                class="remove-button"
                type="button"
                onclick="this.parentElement.remove()"
            >
                Remove
            </button>
        </div>
    </template>

    <!-- WORK EXPERIENCE TEMPLATE -->
    <template id="work-template">
        <div class="repeated-row">
            <input
                type="text"
                name="work_experiences[__I__][company]"
                placeholder="Company"
            >

            <input
                type="text"
                name="work_experiences[__I__][position]"
                placeholder="Position or job title"
            >

            <label>
                Start Date
                <input
                    type="date"
                    name="work_experiences[__I__][start_date]"
                >
            </label>

            <label>
                End Date
                <input
                    type="date"
                    name="work_experiences[__I__][end_date]"
                >
            </label>

            <textarea
                name="work_experiences[__I__][description]"
                rows="3"
                placeholder="Describe your responsibilities"
            ></textarea>

            <button
                class="remove-button"
                type="button"
                onclick="this.parentElement.remove()"
            >
                Remove
            </button>
        </div>
    </template>

    <!-- SOCIAL LINKS TEMPLATE -->
    <template id="social-template">
        <div class="repeated-row">
            <input
                type="text"
                name="social_links[__I__][platform]"
                placeholder="Platform (e.g. GitHub)"
            >

            <input
                type="url"
                name="social_links[__I__][url]"
                placeholder="https://example.com"
            >

            <button
                class="remove-button"
                type="button"
                onclick="this.parentElement.remove()"
            >
                Remove
            </button>
        </div>
    </template>

    <script>
        // Start above the existing row indexes to avoid name conflicts.
        let counter = 1000;

        function addRow(listId, templateId) {
            const html = document
                .getElementById(templateId)
                .innerHTML
                .replaceAll('__I__', counter++);

            document
                .getElementById(listId)
                .insertAdjacentHTML('beforeend', html);
        }
    </script>

    <script>
        // The saved photo is used unless the user chooses a replacement.
        const existingPhoto = @json($photoUrl);

        const previewUrl = "{{ route('portfolios.preview') }}";
        const form = document.getElementById('portfolio-form');
        const frame = document.getElementById('preview-frame');

        let timer = null;
        let latest = 0;
        let controller = null;
        let submitting = false;

        function schedulePreview() {
            if (submitting) return;

            clearTimeout(timer);
            timer = setTimeout(updatePreview, 300);
        }

        async function updatePreview() {
            if (submitting) return;

            const id = ++latest;

            if (controller) controller.abort();
            controller = new AbortController();

            const data = new FormData(form);

            // The preview route should receive the form fields, not PUT override.
            data.delete('_method');

            // Do not upload image files to the server for a preview.
            for (const [key, value] of Array.from(data.entries())) {
                if (value instanceof File) {
                    data.delete(key);
                }
            }

            const images = {};
            let count = 0;

            // Use a newly selected profile picture, or the saved picture.
            const photoInput = form.elements['profile_picture'];

            if (photoInput.dataset.preview) {
                const token = '__IMG_' + (count++) + '__';

                images[token] = photoInput.dataset.preview;
                data.set('photo_url', token);
            } else {
                data.set('photo_url', existingPhoto || '');
            }

            // Use temporary URLs for newly selected project images.
            form.querySelectorAll('input[type="file"]').forEach(input => {
                const match = input.name.match(/^project_images\[(.+)\]$/);

                if (match && input.dataset.preview) {
                    const token = '__IMG_' + (count++) + '__';

                    images[token] = input.dataset.preview;

                    data.set(
                        'projects[' + match[1] + '][project_img]',
                        token
                    );
                }
            });

            let html;

            try {
                const response = await fetch(previewUrl, {
                    method: 'POST',
                    body: data,
                    signal: controller.signal
                });

                if (!response.ok) {
                    throw new Error('Preview failed: ' + response.status);
                }

                html = await response.text();
            } catch (error) {
                if (error.name === 'AbortError') return;

                html = `
                    <div style="
                        margin: 30px;
                        font-family: Arial, sans-serif;
                        color: #a40000;
                    ">
                        <h3>Preview unavailable</h3>
                        <p>Please check your connection and try again.</p>
                    </div>
                `;
            }

            // Ignore responses from older requests.
            if (id !== latest || submitting) return;

            // Replace image placeholders with the temporary image URLs.
            for (const token in images) {
                html = html.replaceAll(token, images[token]);
            }

            // Open links in the portfolio preview in a new tab.
            html = html.replace(
                /<head(\s[^>]*)?>/i,
                '$&<base target="_blank">'
            );

            frame.srcdoc = html;
        }

        // Resize the preview iframe to fit its content.
        frame.addEventListener('load', function () {
            try {
                if (frame.contentDocument) {
                    frame.style.height = '200px';

                    frame.style.height =
                        frame.contentDocument.documentElement.scrollHeight + 'px';
                }
            } catch (error) {
                // Keep the default iframe height if resizing is unavailable.
            }
        });

        // Update the preview when the user edits a field.
        form.addEventListener('input', schedulePreview);

        // Update after adding or removing a row.
        form.addEventListener('click', function (event) {
            if (
                event.target.tagName === 'BUTTON' &&
                event.target.type !== 'submit'
            ) {
                schedulePreview();
            }
        });

        // Keep temporary URLs for selected image files.
        form.addEventListener('change', function (event) {
            if (event.target.type === 'file') {
                const file = event.target.files[0];

                if (event.target.dataset.preview) {
                    URL.revokeObjectURL(event.target.dataset.preview);
                }

                event.target.dataset.preview = file
                    ? URL.createObjectURL(file)
                    : '';
            }

            schedulePreview();
        });

        // Stop preview requests while submitting the update form.
        form.addEventListener('submit', function () {
            submitting = true;
            clearTimeout(timer);

            if (controller) controller.abort();
        });

        // Allow preview updates after navigating back to this page.
        window.addEventListener('pageshow', function () {
            submitting = false;
        });

        // Render the initial preview.
        updatePreview();
    </script>

</div>
</body>
</html>
