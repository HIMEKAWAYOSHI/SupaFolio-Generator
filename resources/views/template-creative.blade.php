
<style>
    .creative-portfolio {
        --creative-purple: #7652b5;
        --creative-light-purple: #eee7fa;
        --creative-orange: #ff9b75;
        --creative-text: #33313b;
        --creative-muted: #706c78;

        max-width: 1100px;
        width: 100%;
        margin: 0 auto;
        padding: 28px;
        box-sizing: border-box;
        background: #fffaf5;
        color: var(--creative-text);
        font-family: Arial, Helvetica, sans-serif;
        border: 1px solid #eee5dc;
        border-radius: 14px;
    }

    .creative-portfolio *,
    .creative-portfolio *::before,
    .creative-portfolio *::after {
        box-sizing: border-box;
    }

    /* PROFILE HEADER */

    .creative-header {
        display: flex;
        align-items: center;
        gap: 25px;
        padding: 28px;
        background: var(--creative-light-purple);
        border-bottom: 5px solid var(--creative-orange);
        border-radius: 12px;
    }

    .creative-profile {
        flex-shrink: 0;
        width: 140px;
        height: 140px;
        object-fit: cover;
        border: 5px solid white;
        border-radius: 50%;
    }

    .creative-header-content {
        min-width: 0;
    }


    .creative-header h1 {
        margin: 0 0 12px;
        color: var(--creative-purple);
        font-size: 34px;
        overflow-wrap: anywhere;
    }

    .creative-header p {
        margin: 7px 0;
        line-height: 1.7;
        overflow-wrap: anywhere;
    }

    .creative-about {
        margin-top: 12px !important;
        color: var(--creative-muted);
        white-space: pre-line;
    }

    

    .creative-section {
        margin-top: 24px;
        padding: 24px;
        background: white;
        border: 1px solid #eee5dc;
        border-top: 4px solid var(--creative-purple);
        border-radius: 12px;
    }

    .creative-section-title {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        margin: 0 0 20px;
        padding-bottom: 12px;
        border-bottom: 1px solid #eee5dc;
    }

    .creative-section-title h2 {
        margin: 0;
        color: var(--creative-purple);
        font-size: 24px;
        overflow-wrap: anywhere;
    }

    .creative-section-number {
        flex-shrink: 0;
        color: var(--creative-orange);
        font-size: 12px;
        font-weight: bold;
    }

    .creative-description {
        margin: 10px 0;
        color: var(--creative-muted);
        line-height: 1.8;
        white-space: pre-line;
        overflow-wrap: anywhere;
    }



    .creative-skills {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .creative-skill {
        padding: 9px 14px;
        color: var(--creative-purple);
        background: var(--creative-light-purple);
        border: 1px solid #ded1f3;
        border-radius: 20px;
        font-size: 14px;
    }

    .creative-skill:nth-child(even) {
        color: #a34f2e;
        background: #fff0e8;
        border-color: #ffd8c7;
    }

    

    .creative-project-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 20px;
        align-items: start;
    }

    .creative-project {
        min-width: 0;
        align-self: start;
        overflow: hidden;
        background: white;
        border: 1px solid #e8e0f0;
        border-radius: 10px;
        transition: transform .2s ease, box-shadow .2s ease;
    }

    .creative-project:hover {
        transform: translateY(-3px);
        box-shadow: 0 7px 16px rgba(80, 55, 120, .12);
    }

    .creative-project-image {
        display: block;
        width: 100%;
        height: 210px;
        object-fit: cover;
        background: #eee7fa;
    }

    .creative-project-content {
        padding: 19px;
    }

    .creative-project-title {
        margin: 0;
        color: var(--creative-purple);
        font-size: 20px;
        overflow-wrap: anywhere;
    }

    .creative-project-link {
        display: inline-block;
        margin-top: 10px;
        color: var(--creative-purple);
        font-size: 14px;
        font-weight: bold;
        text-decoration: none;
    }

    .creative-project-link:hover {
        color: #c45c36;
        text-decoration: underline;
    }

    

    .creative-timeline {
        display: grid;
        gap: 14px;
    }

    .creative-item {
        min-width: 0;
        padding: 18px;
        background: #fffaf5;
        border-left: 4px solid var(--creative-purple);
        border-radius: 0 8px 8px 0;
    }

    .creative-item:nth-child(even) {
        border-left-color: var(--creative-orange);
    }

    .creative-item h3 {
        margin: 0 0 8px;
        color: var(--creative-text);
        font-size: 18px;
        overflow-wrap: anywhere;
    }

    .creative-item-subtitle {
        margin: 0;
        color: var(--creative-purple);
        font-weight: bold;
        line-height: 1.6;
        overflow-wrap: anywhere;
    }

    .creative-item-date {
        display: block;
        margin-top: 8px;
        color: var(--creative-muted);
        font-size: 13px;
    }

    /* SOCIAL LINKS */

    .creative-socials {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .creative-social-link {
        display: inline-block;
        padding: 10px 15px;
        color: white;
        background: var(--creative-purple);
        border-radius: 7px;
        font-size: 14px;
        font-weight: bold;
        text-decoration: none;
        overflow-wrap: anywhere;
        transition: background .2s ease;
    }

    .creative-social-link:hover {
        color: white;
        background: #5d3c98;
    }

    .creative-contact {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: 15px;
    }

    .creative-contact a {
        color: var(--creative-purple);
        overflow-wrap: anywhere;
    }

    /* FOOTER */

    .creative-footer {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 28px;
        padding-top: 18px;
        border-top: 1px solid #e8def7;
        color: var(--creative-muted);
        font-size: 13px;
    }

    .creative-footer strong {
        color: var(--creative-purple);
    }

    /* MOBILE */

    @media (max-width: 650px) {
        .creative-portfolio {
            padding: 14px;
        }

        .creative-header {
            flex-direction: column;
            align-items: flex-start;
            padding: 20px;
        }

        .creative-profile {
            width: 115px;
            height: 115px;
        }

        .creative-header h1 {
            font-size: 28px;
        }

        .creative-section {
            padding: 18px;
        }

        .creative-section-title h2 {
            font-size: 21px;
        }

        .creative-project-grid {
            grid-template-columns: 1fr;
        }

        .creative-project-image {
            height: 200px;
        }

        .creative-footer {
            flex-direction: column;
        }
    }
</style>

<div class="creative-portfolio">

    
    <header class="creative-header">

        @if ($portfolio->profile_picture)
            <img
                class="creative-profile"
                src="{{ $portfolio->profile_picture }}"
                alt="{{ $portfolio->full_name }}"
            >
        @endif

        <div class="creative-header-content">

            

            <h1>{{ $portfolio->full_name }}</h1>

            @if ($portfolio->about_me)
                <p class="creative-about">
                    {{ $portfolio->about_me }}
                </p>
            @endif

            @if ($portfolio->email)
                <p><strong>Email:</strong> {{ $portfolio->email }}</p>
            @endif

            @if ($portfolio->contact_number)
                <p><strong>Contact:</strong> {{ $portfolio->contact_number }}</p>
            @endif

            @if ($portfolio->address)
                <p><strong>Address:</strong> {{ $portfolio->address }}</p>
            @endif

        </div>
    </header>


    @if ($portfolio->skills->isNotEmpty())
        <section class="creative-section">

            <div class="creative-section-title">
                <h2>My Skills</h2>
                <span class="creative-section-number">01</span>
            </div>

            <div class="creative-skills">
                @foreach ($portfolio->skills as $skill)
                    <span class="creative-skill">
                        {{ $skill->skill_name }}
                    </span>
                @endforeach
            </div>

        </section>
    @endif

    

    @if ($portfolio->projects->isNotEmpty())
        <section class="creative-section">

            <div class="creative-section-title">
                <h2>My Projects</h2>
                <span class="creative-section-number">02</span>
            </div>

            <div class="creative-project-grid">

                @foreach ($portfolio->projects as $project)
                    <article class="creative-project">

                        @if ($project->project_img)
                            <img
                                class="creative-project-image"
                                src="{{ $project->project_img }}"
                                alt="{{ $project->project_name }}"
                                loading="lazy"
                            >
                       @else
                            <div class="creative-project-image"></div>
                        @endif

                        <div class="creative-project-content">

                            <h3 class="creative-project-title">
                                {{ $project->project_name }}
                            </h3>

                            @if ($project->description)
                                <p class="creative-description">
                                    {{ $project->description }}
                                </p>
                            @endif

                            @if (
                                $project->project_link &&
                                preg_match('/^https?:\/\//i', $project->project_link)
                            )
                                <a
                                    class="creative-project-link"
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
        <section class="creative-section">

            <div class="creative-section-title">
                <h2>Education</h2>
                <span class="creative-section-number">03</span>
            </div>

            <div class="creative-timeline">
                @foreach ($portfolio->educations as $education)
                    <article class="creative-item">

                        <h3>{{ $education->school_name }}</h3>

                        <p class="creative-item-subtitle">
                            {{ $education->education_level }}

                            @if ($education->degree)
                                - {{ $education->degree }}
                            @endif
                        </p>

                        @if ($education->start_year || $education->end_year)
                            <span class="creative-item-date">
                                {{ $education->start_year ?: 'Not specified' }}
                                -
                                {{ $education->end_year ?: 'Present' }}
                            </span>
                        @endif

                    </article>
                @endforeach
            </div>

        </section>
    @endif

   

    @if ($portfolio->workExperiences->isNotEmpty())
        <section class="creative-section">

            <div class="creative-section-title">
                <h2>Work Experience</h2>
                <span class="creative-section-number">04</span>
            </div>

            <div class="creative-timeline">
                @foreach ($portfolio->workExperiences as $experience)
                    <article class="creative-item">

                        <h3>{{ $experience->position }}</h3>

                        <p class="creative-item-subtitle">
                            {{ $experience->company }}
                        </p>

                        @if ($experience->start_date || $experience->end_date)
                            <span class="creative-item-date">
                                {{ $experience->start_date ?: 'Not specified' }}
                                -
                                {{ $experience->end_date ?: 'Present' }}
                            </span>
                        @endif

                        @if ($experience->description)
                            <p class="creative-description">
                                {{ $experience->description }}
                            </p>
                        @endif

                    </article>
                @endforeach
            </div>

        </section>
    @endif


   
    @if ($portfolio->socialLinks->isNotEmpty())
        <section class="creative-section">

            <div class="creative-section-title">
                <h2>Connect With Me</h2>
                <span class="creative-section-number">05</span>
            </div>

            <div class="creative-socials">
                @foreach ($portfolio->socialLinks as $link)

                    @if (
                        $link->url &&
                        preg_match('/^https?:\/\//i', $link->url)
                    )
                        <a
                            class="creative-social-link"
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


    <footer class="creative-footer">
        <span>Designed with <strong>SupaFolio</strong>.</span>

    </footer>

</div>
