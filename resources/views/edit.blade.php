
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
            padding: 30px 24px 50px;
            background: var(--background);
            color: var(--text);
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
            line-height: 1.6;
        }

        .page-container {
            width: 100%;
            max-width: 1600px;
            margin: 0 auto;
        }

        .page-header {
            margin-bottom: 26px;
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

        .brand-label p {
            margin: 0;
        }

        h1 {
            margin: 0 0 8px;
            color: var(--brown-dark);
            font-size: clamp(27px, 4vw, 35px);
            line-height: 1.25;
            letter-spacing: -1px;
        }

        .page-description {
            max-width: 700px;
            margin: 0;
            color: var(--muted);
            font-size: 14px;
        }

        /* Validation messages */

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

        .required-mark {
            color: var(--red);
            font-weight: 700;
            margin-left: 3px;
        }

        .optional {
            color: #998d82;
            font-size: 11px;
            font-weight: 400;
        }

        .field-error {
            margin: 5px 0 0;
            color: var(--red);
            font-size: 12px;
            line-height: 1.5;
        }

        .input-invalid {
            border-color: var(--red) !important;
            background: #fff8f7 !important;
        }

        .input-invalid:focus {
            border-color: var(--red) !important;
            box-shadow: 0 0 0 3px rgba(180, 35, 24, 0.10) !important;
        }

        .field.has-error label {
            color: var(--red);
        }

        /* Workspace */

        #portfolio-form {
            width: 100%;
        }

        .workspace-grid {
            display: grid;
            grid-template-columns: minmax(0, 0.85fr) minmax(0, 1.15fr);
            align-items: start;
            gap: 24px;
        }

        .form-column,
        .preview-column {
            min-width: 0;
        }

        .form-column {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .preview-column {
            position: sticky;
            top: 20px;
            min-width: 0;
        }

        /* Form sections */

        .form-section {
            min-width: 0;
            margin: 0;
            padding: 22px;
            border: 1px solid var(--border);
            border-radius: 16px;
            background: var(--surface);
            box-shadow: 0 5px 18px rgba(65, 47, 32, 0.035);
        }

        .section-heading {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 22px;
            padding-bottom: 15px;
            border-bottom: 1px solid #f0e9e1;
        }

        .section-number {
            display: flex;
            flex-shrink: 0;
            align-items: center;
            justify-content: center;
            width: 35px;
            height: 35px;
            border-radius: 10px;
            background: #f2ebe3;
            color: var(--brown);
            font-size: 13px;
            font-weight: 700;
        }

        .section-heading h2 {
            margin: 0 0 3px;
            color: var(--brown-dark);
            font-size: 18px;
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
            gap: 17px 13px;
        }

        .field {
            min-width: 0;
            margin-bottom: 17px;
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

        input:not([type="radio"]):not([type="checkbox"]),
        select,
        textarea {
            display: block;
            width: 100%;
            min-width: 0;
            max-width: 100%;
            padding: 10px 11px;
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
            min-height: 120px;
        }

        input[type="file"] {
            padding: 8px !important;
            background: #faf8f5 !important;
            font-size: 12px !important;
            cursor: pointer;
        }

        input[type="file"]::file-selector-button {
            margin-right: 8px;
            padding: 7px 9px;
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

        .current-image {
            display: block;
            width: 100%;
            max-width: 180px;
            max-height: 180px;
            margin-top: 10px;
            border: 1px solid var(--border);
            border-radius: 10px;
            object-fit: contain;
            background: #fff;
        }

        .current-image-label {
            margin: 10px 0 0;
            color: var(--muted);
            font-size: 11px;
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
            align-items: start;
            gap: 12px;
            min-width: 0;
            margin: 0;
            padding: 15px;
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

        .repeated-row .current-image {
            grid-column: 1 / -1;
        }

        /* Buttons */

        button,
        .link-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 10px 14px;
            border: 1px solid var(--border);
            border-radius: 9px;
            background: #ffffff;
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
            grid-template-columns: 1fr;
            gap: 11px;
        }

        .template-option {
            display: flex;
            flex-direction: row;
            align-items: flex-start;
            gap: 12px;
            min-width: 0;
            margin: 0;
            padding: 15px;
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
            gap: 5px;
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

        .preview-section {
            padding: 20px;
        }

        .preview-section .section-heading {
            margin-bottom: 16px;
        }

        .preview-note {
            margin: 0 0 15px;
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
            flex-shrink: 0;
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #8da58b;
        }

        .preview-frame-container {
            width: 100%;
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: #ffffff;
        }

        #preview-frame {
            display: block;
            width: 100%;
            height: 1px;
            min-height: 0;
            border: 0;
            background: #ffffff;
            transition: none;
        }

        /* Form actions */

        .form-actions {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-top: 0;
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
            flex: 1;
            min-width: 155px;
            padding: 12px 16px;
            border-color: var(--green);
            background: var(--green);
            color: #ffffff;
            font-size: 13px;
        }

        .save-button:hover {
            transform: translateY(-1px);
            border-color: #284936;
            background: #284936;
        }

        /* Tablet */

        @media (max-width: 1050px) {
            body {
                padding: 25px 18px 40px;
            }

            .workspace-grid {
                grid-template-columns: minmax(0, 0.9fr) minmax(0, 1.1fr);
                gap: 16px;
            }

            .form-section {
                padding: 17px;
            }

            .preview-section {
                padding: 15px;
            }

            .personal-grid {
                grid-template-columns: 1fr;
            }

            .field.full-width {
                grid-column: auto;
            }

            .repeated-row {
                grid-template-columns: 1fr;
            }

            .repeated-row > textarea {
                grid-column: auto;
            }

            .repeated-row .current-image {
                grid-column: auto;
            }
        }

        /* Mobile */

        @media (max-width: 760px) {
            body {
                padding: 22px 12px 35px;
            }

            .page-header {
                margin-bottom: 22px;
            }

            .workspace-grid {
                grid-template-columns: minmax(0, 1fr);
                gap: 20px;
            }

            .form-column {
                gap: 15px;
            }

            .preview-column {
                position: static;
            }

            .form-section {
                padding: 18px;
                border-radius: 13px;
            }

            .section-heading h2 {
                font-size: 17px;
            }

            .personal-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .field.full-width {
                grid-column: auto;
            }

            .repeated-row {
                grid-template-columns: 1fr;
                padding: 13px;
            }

            .repeated-row > textarea {
                grid-column: auto;
            }

            .repeated-row .current-image {
                grid-column: auto;
            }

            .template-options {
                grid-template-columns: 1fr;
            }

            .template-option {
                padding: 14px;
            }

            .preview-section {
                padding: 15px;
            }

            .form-actions {
                align-items: stretch;
            }

            .actions-buttons {
                width: 100%;
            }

            .actions-buttons .link-button,
            .actions-buttons .save-button {
                flex: 1;
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

        $edu = old('educations', $portfolio->educations->toArray());
        $skl = old('skills', $portfolio->skills->pluck('skill_name')->toArray());
        $prj = old('projects', $portfolio->projects->toArray());
        $wrk = old('work_experiences', $portfolio->workExperiences->toArray());
        $soc = old('social_links', $portfolio->socialLinks->toArray());

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
                Update your personal information, education, skills, projects,
                and experiences to keep your portfolio up to date.
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
        Invalid Inputs Found: {{ $errors->count() }}
    </p>

    <form
        id="portfolio-form"
        action="{{ route('portfolios.update', $portfolio->id) }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf
        @method('PUT')

        <div class="workspace-grid">

            <!-- LEFT COLUMN: FORM INPUTS -->

            <div class="form-column">

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
                            <label for="title">
                                Portfolio Title
                                <span class="required-mark">*</span>
                            </label>

                            <input
                                id="title"
                                type="text"
                                name="title"
                                placeholder="e.g. My Personal Portfolio"
                                value="{{ old('title', $portfolio->title) }}"
                            >
                        </div>

                        <div class="field">
                            <label for="full_name">
                                Full Name
                                <span class="required-mark">*</span>
                            </label>

                            <input
                                id="full_name"
                                type="text"
                                name="full_name"
                                placeholder="Enter your full name"
                                value="{{ old('full_name', $portfolio->full_name) }}"
                            >
                        </div>

                        <div class="field">
                            <label for="email">
                                Email
                                <span class="required-mark">*</span>
                            </label>

                            <input
                                id="email"
                                type="email"
                                name="email"
                                placeholder="you@example.com"
                                value="{{ old('email', $portfolio->email) }}"
                            >
                        </div>

                        <div class="field">
                            <label for="contact_number">
                                Contact Number
                                <span class="required-mark">*</span>
                            </label>

                            <input
                                id="contact_number"
                                type="text"
                                inputmode="numeric"
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

                            <input
                                id="profile_picture"
                                type="file"
                                name="profile_picture"
                                accept="image/jpeg,image/png,image/webp"
                            >

                            <p class="field-help">
                                JPG, PNG, or WEBP. Maximum file size: 2 MB.
                                Leave this empty to keep your current picture.
                            </p>

                            @if ($photoUrl)
                                <p class="current-image-label">
                                    Current profile picture:
                                </p>

                                <img
                                    class="current-image"
                                    src="{{ $photoUrl }}"
                                    alt="Current profile picture"
                                >
                            @endif
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
                        @foreach ($edu as $index => $education)
                            <div class="repeated-row">

                                <select name="educations[{{ $index }}][education_level]">
                                    @foreach ($levels as $level)
                                        <option
                                            value="{{ $level }}"
                                            {{ old("educations.$index.education_level", $education['education_level'] ?? '') === $level ? 'selected' : '' }}
                                        >
                                            {{ $level }}
                                        </option>
                                    @endforeach
                                </select>

                                <input
                                    type="text"
                                    name="educations[{{ $index }}][school_name]"
                                    placeholder="School name"
                                    value="{{ old("educations.$index.school_name", $education['school_name'] ?? '') }}"
                                >

                                <input
                                    type="text"
                                    name="educations[{{ $index }}][degree]"
                                    placeholder="Degree (optional)"
                                    value="{{ old("educations.$index.degree", $education['degree'] ?? '') }}"
                                >

                                <input
                                    type="number"
                                    name="educations[{{ $index }}][start_year]"
                                    placeholder="Start year"
                                    value="{{ old("educations.$index.start_year", $education['start_year'] ?? '') }}"
                                >

                                <input
                                    type="number"
                                    name="educations[{{ $index }}][end_year]"
                                    placeholder="End year"
                                    value="{{ old("educations.$index.end_year", $education['end_year'] ?? '') }}"
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
                        @foreach ($skl as $index => $skill)
                            <div class="repeated-row">
                                <input
                                    type="text"
                                    name="skills[]"
                                    placeholder="e.g. PHP, JavaScript, SQL"
                                    value="{{ $skill }}"
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
                        @foreach ($prj as $index => $project)
                            @php
                                $projectImage = $project['project_img'] ?? '';

                                $projectImageUrl = $projectImage
                                    ? (
                                        filter_var($projectImage, FILTER_VALIDATE_URL)
                                            ? $projectImage
                                            : asset('storage/' . $projectImage)
                                    )
                                    : null;
                            @endphp

                            <div class="repeated-row">

                                <input
                                    type="text"
                                    name="projects[{{ $index }}][project_name]"
                                    placeholder="Project name"
                                    value="{{ old("projects.$index.project_name", $project['project_name'] ?? '') }}"
                                >

                                <input
                                    type="url"
                                    name="projects[{{ $index }}][project_link]"
                                    placeholder="Project link (optional)"
                                    value="{{ old("projects.$index.project_link", $project['project_link'] ?? '') }}"
                                >

                                <input
                                    type="hidden"
                                    name="projects[{{ $index }}][project_img]"
                                    value="{{ old("projects.$index.project_img", $projectImage) }}"
                                >

                                <input
                                    type="file"
                                    name="project_images[{{ $index }}]"
                                    accept="image/jpeg,image/png,image/webp"
                                >

                                @if ($projectImageUrl)
                                    <img
                                        class="current-image"
                                        src="{{ $projectImageUrl }}"
                                        alt="Current project image"
                                    >
                                    <p class="field-help">
                                        Current project image. Choose a new image to replace it.
                                    </p>
                                @endif

                                <textarea
                                    name="projects[{{ $index }}][description]"
                                    placeholder="Describe your project"
                                    rows="3"
                                >{{ old("projects.$index.description", $project['description'] ?? '') }}</textarea>

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
                        @foreach ($wrk as $index => $work)
                            <div class="repeated-row">

                                <input
                                    type="text"
                                    name="work_experiences[{{ $index }}][company]"
                                    placeholder="Company"
                                    value="{{ old("work_experiences.$index.company", $work['company'] ?? '') }}"
                                >

                                <input
                                    type="text"
                                    name="work_experiences[{{ $index }}][position]"
                                    placeholder="Position or job title"
                                    value="{{ old("work_experiences.$index.position", $work['position'] ?? '') }}"
                                >

                                <label>
                                    Start Date
                                    <input
                                        type="date"
                                        name="work_experiences[{{ $index }}][start_date]"
                                        value="{{ old("work_experiences.$index.start_date", $work['start_date'] ?? '') }}"
                                    >
                                </label>

                                <label>
                                    End Date
                                    <input
                                        type="date"
                                        name="work_experiences[{{ $index }}][end_date]"
                                        value="{{ old("work_experiences.$index.end_date", $work['end_date'] ?? '') }}"
                                    >
                                </label>

                                <textarea
                                    name="work_experiences[{{ $index }}][description]"
                                    placeholder="Describe your responsibilities"
                                    rows="3"
                                >{{ old("work_experiences.$index.description", $work['description'] ?? '') }}</textarea>

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
                        @foreach ($soc as $index => $social)
                            <div class="repeated-row">

                                <input
                                    type="text"
                                    name="social_links[{{ $index }}][platform]"
                                    placeholder="Platform (e.g. GitHub)"
                                    value="{{ old("social_links.$index.platform", $social['platform'] ?? '') }}"
                                >

                                <input
                                    type="url"
                                    name="social_links[{{ $index }}][url]"
                                    placeholder="https://example.com"
                                    value="{{ old("social_links.$index.url", $social['url'] ?? '') }}"
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

                        <button class="save-button" type="submit">
                            Save Changes →
                        </button>
                    </div>
                </div>

            </div>

            <!-- RIGHT COLUMN: LIVE PREVIEW -->

            <aside class="preview-column">
                <section class="form-section preview-section">

                    <div class="section-heading">
                        <div class="section-number">08</div>

                        <div>
                            <h2>Live Preview</h2>
                            <p>Your portfolio updates as you edit.</p>
                        </div>
                    </div>

                    <p class="preview-note">
                        See your selected template and portfolio details here.
                        Your saved portfolio will not change until you press Save Changes.
                    </p>

                    <div class="preview-status">
                        <span class="status-dot" id="preview-status-dot"></span>
                        <p id="preview-status-text">Preparing preview...</p>
                    </div>

                    <div class="preview-frame-container">
                        <iframe
                            id="preview-frame"
                            title="Portfolio live preview"
                            loading="eager"
                        ></iframe>
                    </div>

                </section>
            </aside>

        </div>
    </form>

</div>

<!-- EDUCATION INPUT TEMPLATE -->

<template id="education-template">
    <div class="repeated-row">

        <select name="educations[__I__][education_level]">
            @foreach ($levels as $level)
                <option value="{{ $level }}" {{ $level === 'Elementary' ? 'selected' : '' }}>
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

<!-- SKILLS INPUT TEMPLATE -->

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

<!-- PROJECTS INPUT TEMPLATE -->

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

        <textarea
            name="projects[__I__][description]"
            placeholder="Describe your project"
            rows="3"
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

<!-- WORK EXPERIENCE INPUT TEMPLATE -->

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
            placeholder="Describe your responsibilities"
            rows="3"
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

<!-- SOCIAL LINKS INPUT TEMPLATE -->

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
    let counter = 1000;

    function addRow(listId, templateId) {
        const index = counter++;

        const html = document.getElementById(templateId)
            .innerHTML
            .replaceAll('__I__', index);

        const list = document.getElementById(listId);

        list.insertAdjacentHTML('beforeend', html);

        schedulePreview();

        return list.lastElementChild;
    }
</script>

<script>
    const validationErrors = @json($errors->toArray());

    function convertNameToErrorKey(name, element) {
        if (name === 'skills[]') {
            const skillInputs = Array.from(
                document.querySelectorAll('[name="skills[]"]')
            );

            return 'skills.' + skillInputs.indexOf(element);
        }

        return name
            .replace(/\[(.*?)\]/g, '.$1')
            .replace(/\.$/, '');
    }

    function showFieldErrors() {
        let firstInvalidField = null;

        document.querySelectorAll(
            '#portfolio-form input:not([type="radio"]):not([type="checkbox"]), ' +
            '#portfolio-form select, ' +
            '#portfolio-form textarea'
        ).forEach(function (input) {
            const key = convertNameToErrorKey(input.name, input);
            const messages = validationErrors[key];

            if (!messages || messages.length === 0) {
                return;
            }

            input.classList.add('input-invalid');
            input.setAttribute('aria-invalid', 'true');

            const field = input.closest('.field, .repeated-row');

            if (field) {
                field.classList.add('has-error');
            }

            const error = document.createElement('p');
            error.className = 'field-error';
            error.textContent = messages[0];
            error.setAttribute('role', 'alert');

            input.insertAdjacentElement('afterend', error);

            if (!firstInvalidField) {
                firstInvalidField = input;
            }
        });

        if (validationErrors.template) {
            const templateOptions = document.querySelector('.template-options');

            if (templateOptions) {
                const error = document.createElement('p');
                error.className = 'field-error';
                error.textContent = validationErrors.template[0];
                error.setAttribute('role', 'alert');

                templateOptions.insertAdjacentElement('afterend', error);
            }
        }

        if (firstInvalidField) {
            setTimeout(function () {
                firstInvalidField.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });

                firstInvalidField.focus({
                    preventScroll: true
                });
            }, 150);
        }
    }

    showFieldErrors();
</script>

<script>
    const existingPhoto = @json($photoUrl);
    const previewUrl = @json(route('portfolios.preview'));

    const form = document.getElementById('portfolio-form');
    const frame = document.getElementById('preview-frame');
    const statusText = document.getElementById('preview-status-text');
    const statusDot = document.getElementById('preview-status-dot');

    let timer = null;
    let latest = 0;
    let controller = null;
    let submitting = false;
    let previewObserver = null;
    let mutationObserver = null;

    const imageUrls = new Set();

    function setPreviewStatus(message, color) {
        statusText.textContent = message;
        statusDot.style.background = color;
    }

    function resizePreview(height) {
        const number = Number(height);

        if (!Number.isFinite(number) || number <= 0) {
            return;
        }

        frame.style.height = Math.ceil(Math.min(number, 50000)) + 'px';
    }

    function measurePreview() {
        try {
            const doc = frame.contentDocument;

            if (!doc || !doc.documentElement || !doc.body) {
                return;
            }

            const root = doc.documentElement;
            const body = doc.body;

            const height = Math.max(
                root.scrollHeight,
                root.offsetHeight,
                body.scrollHeight,
                body.offsetHeight,
                body.clientHeight
            );

            resizePreview(height);
        } catch (error) {
            console.error('Could not measure portfolio preview:', error);
        }
    }

    function observePreview() {
        try {
            const doc = frame.contentDocument;

            if (!doc || !doc.documentElement || !doc.body) {
                return;
            }

            if (previewObserver) {
                previewObserver.disconnect();
            }

            if (mutationObserver) {
                mutationObserver.disconnect();
            }

            previewObserver = new ResizeObserver(function () {
                requestAnimationFrame(measurePreview);
            });

            previewObserver.observe(doc.documentElement);
            previewObserver.observe(doc.body);

            mutationObserver = new MutationObserver(function () {
                requestAnimationFrame(measurePreview);
            });

            mutationObserver.observe(doc.documentElement, {
                childList: true,
                subtree: true,
                attributes: true,
                characterData: true
            });

            doc.querySelectorAll('img').forEach(function (image) {
                if (!image.complete) {
                    image.addEventListener('load', measurePreview, {
                        once: true
                    });

                    image.addEventListener('error', measurePreview, {
                        once: true
                    });
                }
            });

            if (doc.fonts && doc.fonts.ready) {
                doc.fonts.ready.then(measurePreview);
            }

            measurePreview();

            requestAnimationFrame(measurePreview);
            setTimeout(measurePreview, 100);
            setTimeout(measurePreview, 400);
            setTimeout(measurePreview, 1000);

        } catch (error) {
            console.error('Could not observe portfolio preview:', error);
        }
    }

    window.addEventListener('message', function (event) {
        if (event.source !== frame.contentWindow) {
            return;
        }

        if (
            !event.data ||
            event.data.type !== 'supafolio-preview-height'
        ) {
            return;
        }

        resizePreview(event.data.height);
        requestAnimationFrame(measurePreview);
    });

    frame.addEventListener('load', function () {
        observePreview();
        measurePreview();
    });

    function schedulePreview() {
        if (submitting) {
            return;
        }

        clearTimeout(timer);
        timer = setTimeout(updatePreview, 350);
    }

    function addResizeScript(html) {
        const resizeCode = `
            <style id="supafolio-preview-sizing">
                html {
                    height: auto !important;
                    min-height: 0 !important;
                    overflow-y: hidden !important;
                }

                body {
                    height: auto !important;
                    min-height: 0 !important;
                    overflow-y: visible !important;
                }
            </style>

            <script>
                (function () {
                    let lastHeight = 0;
                    let timer = null;

                    function sendHeight() {
                        const root = document.documentElement;
                        const body = document.body;

                        if (!root || !body) return;

                        const height = Math.ceil(Math.max(
                            root.scrollHeight,
                            root.offsetHeight,
                            body.scrollHeight,
                            body.offsetHeight,
                            body.clientHeight
                        ));

                        if (height > 0 && height !== lastHeight) {
                            lastHeight = height;

                            parent.postMessage({
                                type: 'supafolio-preview-height',
                                height: height
                            }, '*');
                        }
                    }

                    function scheduleHeight() {
                        clearTimeout(timer);
                        timer = setTimeout(sendHeight, 60);
                    }

                    window.addEventListener('load', scheduleHeight);
                    window.addEventListener('resize', scheduleHeight);

                    document.addEventListener('load', scheduleHeight, true);

                    if (window.ResizeObserver) {
                        const observer = new ResizeObserver(scheduleHeight);

                        function startObserver() {
                            if (document.documentElement) {
                                observer.observe(document.documentElement);
                            }

                            if (document.body) {
                                observer.observe(document.body);
                            }
                        }

                        if (document.readyState === 'loading') {
                            document.addEventListener(
                                'DOMContentLoaded',
                                startObserver,
                                { once: true }
                            );
                        } else {
                            startObserver();
                        }
                    }

                    if (document.fonts && document.fonts.ready) {
                        document.fonts.ready.then(scheduleHeight);
                    }

                    if (document.readyState === 'loading') {
                        document.addEventListener(
                            'DOMContentLoaded',
                            scheduleHeight,
                            { once: true }
                        );
                    }

                    sendHeight();
                    requestAnimationFrame(sendHeight);
                    setTimeout(sendHeight, 150);
                    setTimeout(sendHeight, 500);
                    setTimeout(sendHeight, 1200);
                })();
            <\/script>
        `;

        if (/<\/head\s*>/i.test(html)) {
            html = html.replace(/<\/head\s*>/i, resizeCode + '</head>');
        } else {
            html = resizeCode + html;
        }

        return html;
    }

    async function updatePreview() {
        if (submitting) {
            return;
        }

        const id = ++latest;

        if (controller) {
            controller.abort();
        }

        controller = new AbortController();

        const data = new FormData(form);

        data.delete('_method');

        /*
         * Do not upload actual files to the preview endpoint.
         * Selected images are represented by temporary local URLs.
         */
        for (const [key, value] of Array.from(data.entries())) {
            if (value instanceof File) {
                data.delete(key);
            }
        }

        const images = {};
        let count = 0;

        const photoInput = form.elements['profile_picture'];

        if (photoInput && photoInput.dataset.preview) {
            const token = '__IMG_' + count++ + '__';

            images[token] = photoInput.dataset.preview;
            data.set('photo_url', token);
        } else {
            data.set('photo_url', existingPhoto || '');
        }

        form.querySelectorAll('input[type="file"]').forEach(function (input) {
            const match = input.name.match(/^project_images\[(.+)\]$/);

            if (match && input.dataset.preview) {
                const token = '__IMG_' + count++ + '__';

                images[token] = input.dataset.preview;

                data.set(
                    'projects[' + match[1] + '][project_img]',
                    token
                );
            }
        });

        setPreviewStatus('Updating preview...', '#8da58b');

        let html;

        try {
            const response = await fetch(previewUrl, {
                method: 'POST',
                body: data,
                signal: controller.signal,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            if (!response.ok) {
                throw new Error('Preview failed: ' + response.status);
            }

            html = await response.text();

        } catch (error) {
            if (error.name === 'AbortError') {
                return;
            }

            if (id !== latest || submitting) {
                return;
            }

            setPreviewStatus('Preview unavailable', '#b42318');

            html = `
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport"
                          content="width=device-width, initial-scale=1">
                    <style>
                        html, body {
                            height: auto !important;
                            min-height: 0 !important;
                        }

                        body {
                            margin: 0;
                            padding: 25px;
                            font-family: Arial, sans-serif;
                            color: #49382e;
                            line-height: 1.6;
                        }
                    </style>
                </head>
                <body>
                    <h2>Preview unavailable</h2>
                    <p>
                        Please check your connection and try changing
                        a field again.
                    </p>
                </body>
                </html>
            `;
        }

        if (id !== latest || submitting) {
            return;
        }

        for (const token in images) {
            html = html.split(token).join(images[token]);
        }

        if (/<head(?:\s[^>]*)?>/i.test(html)) {
            html = html.replace(
                /<head(\s[^>]*)?>/i,
                '$&<base target="_blank">'
            );
        } else {
            html = '<base target="_blank">' + html;
        }

        html = addResizeScript(html);

        frame.style.height = '1px';
        frame.srcdoc = html;

        setPreviewStatus('Preview updated', '#3d8a54');
    }

    /* Update while typing. */

    form.addEventListener('input', schedulePreview);

    /* Update after adding or removing rows. */

    form.addEventListener('click', function (event) {
        const button = event.target.closest('button');

        if (button && button.type !== 'submit') {
            schedulePreview();
        }
    });

    /* Update after selecting a template or image. */

    form.addEventListener('change', function (event) {
        if (event.target.type === 'file') {
            const input = event.target;
            const file = input.files[0];

            if (input.dataset.preview) {
                URL.revokeObjectURL(input.dataset.preview);
                imageUrls.delete(input.dataset.preview);
            }

            input.dataset.preview = '';

            if (file && file.type.startsWith('image/')) {
                const url = URL.createObjectURL(file);

                input.dataset.preview = url;
                imageUrls.add(url);
            }
        }

        schedulePreview();
    });

    /* Stop preview requests when saving. */

    form.addEventListener('submit', function () {
        submitting = true;

        clearTimeout(timer);

        if (controller) {
            controller.abort();
        }
    });

    window.addEventListener('pageshow', function () {
        submitting = false;
    });

    window.addEventListener('pagehide', function () {
        imageUrls.forEach(function (url) {
            URL.revokeObjectURL(url);
        });

        imageUrls.clear();
    });

    /* Display the initial preview. */

    updatePreview();
</script>

</body>
</html>
