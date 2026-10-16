
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Portfolio | SupaFolio</title>

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

        /* Fields */

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

        /* Education, skills, projects, work and social rows */

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

        .template-preview {
            display: flex;
            flex-direction: column;
            gap: 6px;
            justify-content: center;
            height: 70px;
            margin-bottom: 13px;
            padding: 12px;
            border: 1px solid #e9e1d8;
            border-radius: 8px;
            background: #ffffff;
        }

        .template-line {
            height: 5px;
            border-radius: 4px;
            background: #e9e1d8;
        }

        .template-line.short {
            width: 55%;
        }

        .template-preview.simple .template-line:first-child {
            width: 70%;
            height: 7px;
            background: #cbb7a3;
        }

        .template-preview.modern {
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-content: center;
            gap: 6px;
            background: #eef3ed;
        }

        .template-preview.modern .template-line:first-child {
            grid-column: 1 / -1;
            height: 9px;
            background: #8ba38a;
        }

        .template-preview.creative {
            background: #f5e9e0;
        }

        .template-preview.creative .template-line:first-child {
            width: 65%;
            height: 9px;
            background: #bd8c73;
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

        .status-dot {
            width: 7px;
            height: 7px;
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
            min-width: 155px;
            padding: 12px 20px;
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

        /* Responsive design */

        @media (max-width: 700px) {
            body {
                padding: 24px 14px 40px;
            }

            .page-header {
                flex-direction: column;
                gap: 10px;
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

         
            .template-options {
                grid-template-columns: 1fr;
            }

            .template-option {
                padding: 17px;
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

    <header class="page-header">
        <div>
            <div class="brand-label">
                <span class="brand-dot"></span>
                <p>SupaFolio</p>
            </div>

            <h1>Create Your Portfolio</h1>

            <p class="page-description">
                Add your personal information,
                education, skills, projects, and experiences to build
                a portfolio that represents you.
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
        action="{{ route('portfolios.store') }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf

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
                        value="{{ old('title') }}"
                    >
                </div>

                <div class="field">
                    <label for="full_name">Full Name</label>
                    <input
                        id="full_name"
                        type="text"
                        name="full_name"
                        placeholder="Enter your full name"
                        value="{{ old('full_name') }}"
                    >
                </div>

                <div class="field">
                    <label for="email">Email</label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        placeholder="you@example.com"
                        value="{{ old('email') }}"
                    >
                </div>

                <div class="field">
                    <label for="contact_number">Contact Number</label>
                    <input
                        id="contact_number"
                        type="text"
                        name="contact_number"
                        placeholder="Enter your contact number"
                        value="{{ old('contact_number') }}"
                    >
                </div>

                <div class="field full-width">
                    <label for="address">Address</label>
                    <input
                        id="address"
                        type="text"
                        name="address"
                        placeholder="City, province, or address"
                        value="{{ old('address') }}"
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
                    >{{ old('about_me') }}</textarea>
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

            <div id="education-list" class="repeated-list"></div>

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

            <div id="skills-list" class="repeated-list"></div>

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

            <div id="projects-list" class="repeated-list"></div>

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

            <div id="work-list" class="repeated-list"></div>

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

            <div id="social-list" class="repeated-list"></div>

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
                {{ old('template', 'simple') === 'simple' ? 'checked' : '' }}
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
                {{ old('template') === 'modern' ? 'checked' : '' }}
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
                {{ old('template') === 'creative' ? 'checked' : '' }}
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
                    <p>See how your portfolio looks as you fill in the form.</p>
                </div>
            </div>

            <p class="preview-note">
                Your preview updates automatically. Your portfolio is not
                saved until you press Save Portfolio.
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
                Review your information before saving.
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
                    Save Portfolio →
                </button>
            </div>
        </div>
    </form>

</div>

<!-- EDUCATION INPUT TEMPLATE -->
<template id="education-template">
    <div class="repeated-row">
        <select name="educations[__I__][education_level]">
            <option selected>Elementary</option>
            <option>High School</option>
            <option>Senior High School</option>
            <option>Vocational</option>
            <option>College</option>
            <option>Graduate</option>
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
    let counter = 0;

    function addRow(listId, templateId) {
        const index = counter++;
        addRowAt(listId, templateId, index);
    }

    function addRowAt(listId, templateId, index) {
        const html = document.getElementById(templateId)
            .innerHTML
            .replaceAll('__I__', index);

        const list = document.getElementById(listId);
        list.insertAdjacentHTML('beforeend', html);

        counter = Math.max(counter, Number(index) + 1);

        return list.lastElementChild;
    }

    function restoreRows(listId, templateId, rows, prefix) {
        if (!rows || typeof rows !== 'object') return;

        Object.entries(rows).forEach(([index, values]) => {
            const row = addRowAt(listId, templateId, index);

            if (!values || typeof values !== 'object') return;

            Object.entries(values).forEach(([field, value]) => {
                const input = row.querySelector(
                    `[name="${prefix}[${index}][${field}]"]`
                );

                if (input && input.type !== 'file') {
                    input.value = value ?? '';
                }
            });
        });
    }

    restoreRows(
        'education-list',
        'education-template',
        @json(old('educations', [])),
        'educations'
    );

    restoreRows(
        'projects-list',
        'projects-template',
        @json(old('projects', [])),
        'projects'
    );

    restoreRows(
        'work-list',
        'work-template',
        @json(old('work_experiences', [])),
        'work_experiences'
    );

    restoreRows(
        'social-list',
        'social-template',
        @json(old('social_links', [])),
        'social_links'
    );

    const oldSkills = @json(old('skills', []));

    if (Array.isArray(oldSkills)) {
        oldSkills.forEach(skill => {
            const row = addRowAt(
                'skills-list',
                'skills-template',
                counter++
            );

            const input = row.querySelector('input[name="skills[]"]');

            if (input) input.value = skill ?? '';
        });
    }
</script>

<script>
    // CREATE page: there is no saved profile picture yet.
    const existingPhoto = '';

    const previewUrl = "{{ route('portfolios.preview') }}";
    const form = document.getElementById('portfolio-form');
    const frame = document.getElementById('preview-frame');

    let timer = null;
    let latest = 0;
    let controller = null;
    let submitting = false;

    // Wait until the user pauses typing before updating the preview.
    function schedulePreview() {
        if (submitting) return;

        clearTimeout(timer);
        timer = setTimeout(updatePreview, 300);
    }

    async function updatePreview() {
        if (submitting) return;

        const id = ++latest;

        // Cancel the previous request if it is still running.
        if (controller) controller.abort();
        controller = new AbortController();

        const data = new FormData(form);
        data.delete('_method');

        // Files are not sent to the server during preview.
        // Temporary image URLs are inserted into the returned HTML instead.
        for (const [key, value] of Array.from(data.entries())) {
            if (value instanceof File) {
                data.delete(key);
            }
        }

        const images = {};
        let count = 0;

        // Profile picture preview.
        const photoInput = form.elements['profile_picture'];

        if (photoInput.dataset.preview) {
            const token = '__IMG_' + (count++) + '__';

            images[token] = photoInput.dataset.preview;
            data.set('photo_url', token);
        } else {
            data.set('photo_url', existingPhoto || '');
        }

        // Project thumbnails.
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
                    <p>Please check your connection and try changing a field again.</p>
                </div>
            `;
        }

        // Ignore outdated responses and requests after Save is pressed.
        if (id !== latest || submitting) return;

        // Replace temporary image tokens with their local preview URLs.
        for (const token in images) {
            html = html.replaceAll(token, images[token]);
        }

        // Open portfolio links in a new tab.
        html = html.replace(
            /<head(\s[^>]*)?>/i,
            '$&<base target="_blank">'
        );

        frame.srcdoc = html;
    }

    // Resize the iframe to fit the rendered portfolio.
    frame.addEventListener('load', function () {
        if (frame.contentDocument) {
            frame.style.height = '200px';

            frame.style.height =
                frame.contentDocument.documentElement.scrollHeight + 'px';
        }
    });

    // Typing in a field triggers a preview update.
    form.addEventListener('input', schedulePreview);

    // Adding or removing a row triggers a preview update.
    form.addEventListener('click', function (event) {
        if (
            event.target.tagName === 'BUTTON' &&
            event.target.type !== 'submit'
        ) {
            schedulePreview();
        }
    });

    form.addEventListener('change', function (event) {
        // Keep a temporary URL for a selected image.
        if (event.target.type === 'file') {
            const file = event.target.files[0];

            event.target.dataset.preview = file
                ? URL.createObjectURL(file)
                : '';
        }

        schedulePreview();
    });

    // Stop preview requests when Save is pressed.
    form.addEventListener('submit', function () {
        submitting = true;
        clearTimeout(timer);

        if (controller) controller.abort();
    });

    // Allow preview updates when returning with the browser's Back button.
    window.addEventListener('pageshow', function () {
        submitting = false;
    });

    // Draw the initial preview.
    updatePreview();
</script>

</body>
</html>
