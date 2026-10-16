
<style>
   
    .modern-portfolio {
        --modern-accent: #6366f1;
        --modern-text: #172033;
        --modern-muted: #64748b;

        max-width: 1100px;
        width: 100%;
        margin: 0 auto;
        padding: 40px;
        box-sizing: border-box;

   
        background: linear-gradient(
            135deg,
            #e0e7ff 0%,
            #eef2ff 45%,
            #f5eefe 100%);

            color: var(--modern-text);
            font-family: Arial, Helvetica, sans-serif;
            border-radius: 20px;

    }

    .modern-portfolio * {
        box-sizing: border-box;
    }

    .modern-hero {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 35px;
        padding: 35px;
        background: linear-gradient(120deg, #ffffff 0%, #f0f4ff 100%);
        border: 1px solid  #dbe3ff;
        border-radius: 20px;
        box-shadow:  0 8px 30px rgba(79, 70, 229, 0.08);
    }

    .modern-hero-content {
        flex: 1;
        min-width: 0;
    }

    .modern-eyebrow {
        display: inline-block;
        margin-bottom: 12px;
        color: var(--modern-accent);
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    .modern-name {
        margin: 0 0 14px;
        font-size: clamp(28px, 4vw, 44px);
        line-height: 1.2;
        overflow-wrap: anywhere;
    }

    .modern-contact {
        color: var(--modern-muted);
        font-size: 14px;
        line-height: 1.9;
        overflow-wrap: anywhere;
    }

    .modern-profile {
        width: 175px;
        height: 175px;
        flex-shrink: 0;
        object-fit: cover;
        border-radius: 22px;
        background: #e0e7ff;
        border: 4px solid #eef2ff;
    }

    .modern-card {
        margin-top: 25px;
        padding: 30px;
        background: rgba(255, 255, 255, 0.92);
        border: 1px solid #e0e7ff;
        border-radius: 18px;
        box-shadow: 0 8px 30px #4f46e50f;
    }

    .modern-section-title {
        margin: 0 0 20px;
        font-size: 22px;
        font-weight: 700;
        letter-spacing: -.4px;
    }

    .modern-description {
        max-width: 720px;
        width: 100%;
        margin: 0;
        color: #475569;
        font-size: 15px;
        line-height: 1.9;
        text-align: left;
        white-space: pre-line;
        overflow-wrap: anywhere;
    }

    .modern-skills {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .modern-skill {
        display: inline-block;
        padding: 9px 14px;
        color: #4338ca;
        background: #eef2ff;
        border: 1px solid #e0e7ff;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 600;
        overflow-wrap: anywhere;
    }

    .modern-education,
    .modern-experience {
        padding: 18px 0;
        border-bottom: 1px solid #e2e8f0;
    }

    .modern-education:first-of-type,
    .modern-experience:first-of-type {
        padding-top: 0;
    }

    .modern-education:last-child,
    .modern-experience:last-child {
        padding-bottom: 0;
        border-bottom: none;
    }

    .modern-entry-title {
        margin: 0 0 7px;
        font-size: 16px;
        font-weight: 700;
        line-height: 1.5;
        overflow-wrap: anywhere;
    }

    .modern-entry-details {
        margin: 0;
        color: var(--modern-muted);
        font-size: 13px;
        line-height: 1.8;
        overflow-wrap: anywhere;
    }

    .modern-project-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 22px;
    }

    .modern-project {
        min-width: 0;
        overflow: hidden;
        border: 1px solid #e2e8f0;
        border-radius: 15px;
        background: #fff;
        transition: transform .2s ease, box-shadow .2s ease;
    }

    .modern-project:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 28px rgba(15, 23, 42, .08);
    }

    .modern-project-image {
        display: block;
        width: 100%;
        height: 260px;
        object-fit: contain;
        object-position: center;
        background: #f1f5f9;
        border-bottom: 1px solid #e2e8f0;
    }

    .modern-project-content {
        padding: 22px;
    }

    .modern-project-title {
        margin: 0 0 12px;
        font-size: 18px;
        line-height: 1.5;
        overflow-wrap: anywhere;
    }

    .modern-project-content .modern-description {
        font-size: 14px;
        line-height: 1.8;
    }

    .modern-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        margin-top: 18px;
        padding: 11px 17px;
        color: #fff;
        background: var(--modern-accent);
        border: 1px solid var(--modern-accent);
        border-radius: 10px;
        text-decoration: none;
        font-size: 13px;
        font-weight: 700;
        transition: background .2s ease;
        overflow-wrap: anywhere;
    }

    .modern-button:hover {
        color: #fff;
        background: #4f46e5;
    }

    .modern-button:focus-visible {
        outline: 3px solid #c7d2fe;
        outline-offset: 3px;
    }

    .modern-social-links {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
    }

    .modern-social-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 11px 16px;
        color: #334155;
        background: #fff;
        border: 1px solid #cbd5e1;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 700;
        text-decoration: none;
        overflow-wrap: anywhere;
        transition: all .2s ease;
    }

    .modern-social-button:hover {
        color: var(--modern-accent);
        background: #eef2ff;
        border-color: #c7d2fe;
    }

    .modern-footer {
        padding: 28px 10px 0;
        color: #94a3b8;
        text-align: center;
        font-size: 12px;
    }

    @media (max-width: 700px) {
        .modern-portfolio {
            padding: 15px;
            border-radius: 12px;
        }

        .modern-hero {
            flex-direction: column-reverse;
            align-items: flex-start;
            padding: 24px;
        }

        .modern-profile {
            width: 125px;
            height: 125px;
        }

        .modern-card {
            padding: 22px;
            margin-top: 16px;
        }

        .modern-project-grid {
            grid-template-columns: 1fr;
        }

        .modern-project-image {
            height: 230px;
        }
    }
</style>

<div class="modern-portfolio">

    
    <header class="modern-hero">
        <div class="modern-hero-content">
            <span class="modern-eyebrow">Personal Portfolio</span>

            <h1 class="modern-name">
                {{ $portfolio->full_name }}
            </h1>

            <div class="modern-contact">
                @if ($portfolio->email)
                    <div>{{ $portfolio->email }}</div>
                @endif

                @if ($portfolio->contact_number)
                    <div>{{ $portfolio->contact_number }}</div>
                @endif

                @if ($portfolio->address)
                    <div>{{ $portfolio->address }}</div>
                @endif
            </div>
        </div>

        @if ($portfolio->profile_picture)
            <img
                class="modern-profile"
                src="{{ $portfolio->profile_picture }}"
                alt="Profile picture of {{ $portfolio->full_name }}"
            >
        @endif
    </header>

    @if ($portfolio->about_me)
        <section class="modern-card">
            <h2 class="modern-section-title">About Me</h2>

            <p class="modern-description">{{ $portfolio->about_me }}</p>
        </section>
    @endif

   
    @if ($portfolio->skills->isNotEmpty())
        <section class="modern-card">
            <h2 class="modern-section-title">Skills</h2>

            <div class="modern-skills">
                @foreach ($portfolio->skills as $skill)
                    <span class="modern-skill">
                        {{ $skill->skill_name }}
                    </span>
                @endforeach
            </div>
        </section>
    @endif

    
    @if ($portfolio->projects->isNotEmpty())
        <section class="modern-card">
            <h2 class="modern-section-title">Featured Projects</h2>

            <div class="modern-project-grid">
                @foreach ($portfolio->projects as $project)
                    <article class="modern-project">

                        @if ($project->project_img)
                            <img
                                class="modern-project-image"
                                src="{{ $project->project_img }}"
                                alt="{{ $project->project_name }}"
                                loading="lazy"
                            >
                        @else
                           <div class="modern-project-image"></div>
                        @endif

                        <div class="modern-project-content">
                            <h3 class="modern-project-title">
                                {{ $project->project_name }}
                            </h3>

                            @if ($project->description)
                                <p class="modern-description">{{ $project->description }}</p>
                            @endif

                            @if (
                                $project->project_link &&
                                preg_match('/^https?:\/\//i', $project->project_link)
                            )
                                <a
                                    class="modern-button"
                                    href="{{ $project->project_link }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >
                                    View Project &rarr;
                                </a>
                            @endif
                        </div>

                    </article>
                @endforeach
            </div>
        </section>
    @endif

    
    @if ($portfolio->educations->isNotEmpty())
        <section class="modern-card">
            <h2 class="modern-section-title">Education</h2>

            @foreach ($portfolio->educations as $edu)
                <div class="modern-education">
                    <h3 class="modern-entry-title">
                        {{ $edu->school_name }}
                    </h3>

                    <p class="modern-entry-details">
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

    
    @if ($portfolio->workExperiences->isNotEmpty())
        <section class="modern-card">
            <h2 class="modern-section-title">Work Experience</h2>

            @foreach ($portfolio->workExperiences as $job)
                <div class="modern-experience">
                    <h3 class="modern-entry-title">
                        {{ $job->position }}
                    </h3>

                    <p class="modern-entry-details">
                        {{ $job->company }}

                        @if ($job->start_date || $job->end_date)
                            · {{ $job->start_date ?? '—' }}
                            - {{ $job->end_date ?? 'Present' }}
                        @endif
                    </p>

                    @if ($job->description)
                        <p class="modern-description" style="margin-top: 12px;">
                            {{ $job->description }}
                        </p>
                    @endif
                </div>
            @endforeach
        </section>
    @endif

   
    @if ($portfolio->socialLinks->isNotEmpty())
        <section class="modern-card">
            <h2 class="modern-section-title">Connect With Me</h2>

            <div class="modern-social-links">
                @foreach ($portfolio->socialLinks as $link)
                    
                    @if (preg_match('/^https?:\/\//i', $link->url))
                        <a
                            class="modern-social-button"
                            href="{{ $link->url }}"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            {{ $link->platform }} &nearr;
                        </a>
                    @endif

                @endforeach
            </div>
        </section>
    @endif

    <footer class="modern-footer">
        <span>Designed with <strong>SupaFolio</strong>.</span>

    </footer>

</div>
