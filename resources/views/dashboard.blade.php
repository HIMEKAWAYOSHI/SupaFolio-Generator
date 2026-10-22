
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | SupaFolio</title>

    <style>
        :root {
            --bg: #fffdfb;
            --surface: #ffffff;
            --text: #352d27;
            --muted: #8b8178;
            --border: #eee7df;
            --green: #e7f2e7;
            --green-dark: #355c45;
            --brown: #665044;
            --danger: #b84c43;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--bg);
            color: var(--text);
            font-family: Arial, Helvetica, sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button {
            font: inherit;
        }

        /* HEADER */

        .topbar {
            height: 76px;
            padding: 0 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid var(--border);
            background: rgba(255, 253, 251, 0.97);

            /* Keeps the header at the top while scrolling */
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 21px;
            font-weight: 700;
            letter-spacing: -0.7px;
        }

    
        .topbar-right {
            display: flex;
            align-items: center;
            gap: 17px;
        }

       .about-btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            padding: 10px 14px;
            min-height: 39px;
            border: 1px solid var(--border);
            border-radius: 9px;
            color: var(--brown);
            font-size: 13px;
            font-family: inherit;
            line-height: normal;
            transition: 0.2s;
        }

        .about-btn:hover {
            background: #f5eee7;
            border-color: #dfd4c8;
        }

        .user-label {
            font-size: 13px;
            color: var(--muted);
        }

        

        .logout-btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            min-height: 39px;
            padding: 10px 14px;
            background: transparent;
            border: 1px solid var(--border);
            border-radius: 9px;
            color: var(--brown);
            font-size: 13px;
            font-family: inherit;
            line-height: normal;
            cursor: pointer;
            transition: 0.2s;
        }

        .logout-btn:hover {
            background: #f5eee7;
        }

        /* MAIN CONTENT */

        .container {
            width: 86%;
            max-width: 1180px;
            margin: 0 auto;
            padding: 48px 0 70px;
        }

        .page-heading {
            display: flex;
            align-items: center;
            gap: 13px;
            margin-bottom: 8px;
        }


        .page-heading h1 {
            margin: 0;
            font-size: 30px;
            font-weight: 700;
            letter-spacing: -1.1px;
        }

        .subtitle {
            margin: 0 0 30px 1px;
            color: var(--muted);
            font-size: 14px;
            line-height: 1.6;
        }

        /* WELCOME PANEL AND CREATE BUTTON */

        .welcome-row {
            display: grid;
            grid-template-columns: 1fr auto;
            gap: 20px;
            align-items: stretch;
            margin-bottom: 45px;
        }

        .welcome-panel {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 23px 25px;
            border: 1px solid #dce8d9;
            background: var(--green);
            border-radius: 15px;
        }

        .welcome-icon {
            width: 45px;
            height: 45px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.75);
            border-radius: 12px;
            font-size: 22px;
        }

        .welcome-panel h2 {
            margin: 0 0 6px;
            font-size: 17px;
            font-weight: 700;
            color: #304b37;
        }

        .welcome-panel p {
            margin: 0;
            font-size: 13px;
            color: #627965;
            line-height: 1.5;
        }

        .create-btn {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 9px;
            padding: 0 24px;
            min-width: 190px;
            border-radius: 12px;
            background: var(--green-dark);
            color: white;
            font-weight: 600;
            font-size: 14px;
            transition: 0.2s;
        }

        .create-btn:hover {
            background: #284936;
            transform: translateY(-1px);
        }

        .create-plus {
            font-size: 21px;
            font-weight: 400;
        }

        /* SUCCESS MESSAGE */

        .success-message {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 14px 17px;
            margin: -23px 0 32px;
            border: 1px solid #dce8d9;
            background: #f0f7ee;
            color: #355c45;
            border-radius: 10px;
            font-size: 14px;
        }

        /* PORTFOLIO SECTION */

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .section-heading h2 {
            margin: 0 0 7px;
            font-size: 21px;
            letter-spacing: -0.5px;
        }

        .section-heading p {
            margin: 0;
            font-size: 13px;
            color: var(--muted);
        }

        .portfolio-count {
            padding: 7px 11px;
            border: 1px solid var(--border);
            border-radius: 20px;
            color: var(--brown);
            font-size: 12px;
            white-space: nowrap;
        }

        /* PORTFOLIO CARDS */

        .cards {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 21px;
        }

        .card {
            min-width: 0;
            display: flex;
            flex-direction: column;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 14px;
            overflow: hidden;
            transition: transform 0.2s, box-shadow 0.2s,
                        border-color 0.2s;
        }

        .card:hover {
            transform: translateY(-3px);
            border-color: #d9cfc4;
            box-shadow: 0 9px 25px rgba(75, 54, 39, 0.06);
        }

        .card-preview {
            height: 180px;
            width: 100%;
            overflow: hidden;
            position: relative;
            border-radius: 10px;
            background: #fffdfb;
        }

        .preview-sheet {
            width: 100%;
            height: 100%;
            padding: 12px;
            background: white;
            border: 1px solid #eae2d9;
            border-radius: 6px;
            overflow: hidden;
        }

        .preview-top {
            display: flex;
            gap: 5px;
            margin-bottom: 12px;
        }

        .preview-dot {
            width: 5px;
            height: 5px;
            background: #d8cbbd;
            border-radius: 50%;
        }

        .preview-title {
            height: 7px;
            width: 43%;
            background: #c4b5a5;
            border-radius: 4px;
            margin-bottom: 7px;
        }

        .preview-line {
            height: 4px;
            width: 70%;
            background: #eee8e1;
            border-radius: 4px;
            margin-bottom: 5px;
        }

        .preview-line.short {
            width: 45%;
        }

        .preview-blocks {
            display: flex;
            gap: 7px;
            margin-top: 13px;
        }

        .preview-block {
            height: 37px;
            flex: 1;
            background: #eee7de;
            border-radius: 4px;
        }

        .preview-block:nth-child(2) {
            background: #dce8d9;
        }

        .preview-block:nth-child(3) {
            background: #e9ded4;
        }

        .card:nth-child(3n + 2) .card-preview {
            background: #e8eee8;
        }

        .card:nth-child(3n + 2) .preview-block {
            background: #d9e5d8;
        }

        .card:nth-child(3n + 3) .card-preview {
            background: #eee4e8;
        }

        .card:nth-child(3n + 3) .preview-block {
            background: #e8d5df;
        }

        .card-content {
            display: flex;
            flex: 1;
            flex-direction: column;
            padding: 18px;
        }

        .card-title-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 10px;
        }

        .card h3 {
            margin: 0 0 8px;
            font-size: 16px;
            line-height: 1.4;
            overflow-wrap: anywhere;
        }

        .card-name {
            margin: 0 0 15px;
            color: var(--muted);
            font-size: 13px;
            overflow-wrap: anywhere;
        }

        .card-date {
            margin-top: auto;
            padding-top: 12px;
            border-top: 1px solid #f2ede7;
            color: var(--muted);
            font-size: 11px;
        }

        .card-actions {
            display: flex;
            gap: 8px;
            margin-top: 15px;
        }

        .action-btn {
            flex: 1;
            padding: 9px 8px;
            text-align: center;
            font-size: 12px;
            font-weight: 600;
            border: 1px solid var(--border);
            border-radius: 8px;
            background: white;
            color: var(--brown);
            cursor: pointer;
            transition: 0.2s;
        }

        .action-btn:hover {
            background: #f7f2ed;
        }

        .action-btn.primary {
            background: #edf3ea;
            border-color: #e0e9dc;
            color: var(--green-dark);
        }

        .action-btn.primary:hover {
            background: #dfeadb;
        }

        .delete-form {
            display: flex;
            flex: 1;
            margin: 0;
        }

        .delete-btn {
            width: 100%;
            color: var(--danger);
        }

        .delete-btn:hover {
            background: #fff1ef;
            border-color: #f1d4cf;
        }

        /* EMPTY STATE */

        .empty-state {
            padding: 55px 20px;
            text-align: center;
            background: white;
            border: 1px dashed #dfd5ca;
            border-radius: 14px;
        }

    

        .empty-state h3 {
            margin: 0 0 8px;
            font-size: 18px;
        }

        .empty-state p {
            max-width: 340px;
            margin: 0 auto 22px;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.7;
        }

        .empty-create {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 18px;
        }

        /* RESPONSIVE */

        @media (max-width: 900px) {
            .topbar {
                padding: 0 5%;
            }

            .container {
                width: 90%;
            }

            .cards {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .welcome-row {
                grid-template-columns: 1fr;
            }

            .create-btn {
                min-height: 50px;
            }
        }

        @media (max-width: 560px) {
            .topbar {
                height: 67px;
            }

            .brand {
                font-size: 18px;
            }


            .user-label {
                display: inline;
            }

            .topbar-right {
                display: flex;
                align-items: center;
                gap: 17px;
            }

            .logout-btn {
                padding: 9px 10px;
                font-size: 12px;
            }

            .container {
                width: 90%;
                padding-top: 32px;
            }

            .page-heading h1 {
                font-size: 26px;
            }

            .subtitle {
                margin-left: 0;
                margin-top: 12px;
            }

            .welcome-panel {
                padding: 18px;
            }

            .welcome-panel h2 {
                font-size: 15px;
            }

            .welcome-panel p {
                font-size: 12px;
            }

            .cards {
                grid-template-columns: 1fr;
            }

            .card-preview {
                height: 155px;
            }

            .section-heading h2 {
                font-size: 19px;
            }

            .about-btn,
            .logout-btn {
                min-height: 35px;
                padding: 9px 10px;
                font-size: 12px;
            }
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <header class="topbar">

        <a href="{{ route('dashboard') }}" class="brand">
           
            <span>SupaFolio</span>
        </a>


        <div class="topbar-right">
              
            <span class="user-label">
                 <a href="{{ route('about') }}" class="about-btn">
                About
            </a>
            </span>

            

            <form action="{{ route('logout') }}" method="POST" 
                onsubmit="return confirm('Are you sure you want to log out?');"
                >

                
                @csrf
                <button type="submit" class="logout-btn">
                    Log out
                </button>
            </form>
        </div>

    </header>


    <!-- MAIN DASHBOARD -->
    <main class="container">

        <!-- PAGE TITLE -->
        <div class="page-heading">
            <h1>Dashboard</h1>
        </div>

        <p class="subtitle">
            Manage your portfolios and bring your professional story to life.
        </p>


        <!-- WELCOME PANEL + CREATE BUTTON -->
        <section class="welcome-row">

            <div class="welcome-panel">
                <div class="welcome-icon">👋</div>

                <div>
                    <h2>
                        Welcome {{ Auth::user()->username }}!
                    </h2>

                    <p>
                        Ready to create something amazing? Your next opportunity
                        starts here ^-^
                    </p>
                </div>
            </div>

            <a href="{{ route('portfolios.create') }}" class="create-btn">
                <span class="create-plus">+</span>
                Create Portfolio
            </a>

        </section>


        
        @if (session('success'))
            <div class="success-message">
                <span>✓</span>
                {{ session('success') }}
            </div>
        @endif


        
        <section>

            <div class="section-heading">
                <div>
                    <h2>Your Portfolios</h2>
                    <p>All your work is here</p>
                </div>

                <span class="portfolio-count">
                    {{ $portfolios->count() }}
                    {{ $portfolios->count() === 1 ? 'portfolio' : 'portfolios' }}
                </span>
            </div>


            
            @forelse ($portfolios as $portfolio)

                @if ($loop->first)
                    <div class="cards">
                @endif

                <article class="card">

                    
                    <div class="card-preview">
                        @include('portfolios-thumbnails.' . $portfolio->template, [
                                'portfolio' => $portfolio
                                    ])

                    </div>


                    <!-- Portfolio details -->
                    <div class="card-content">

                        <div class="card-title-row">
                            <h3>{{ $portfolio->title }}</h3>
                        </div>

                        <p class="card-name">
                            {{ $portfolio->full_name }}
                        </p>

                        <div class="card-date">
                            <p>Created at
                            {{ $portfolio->created_at->format('M d, Y') }}</p>
                            
                        </div>


                        <!-- Portfolio actions -->
                        <div class="card-actions">

                            <a
                                href="{{ route('portfolios.show', $portfolio->id) }}"
                                class="action-btn primary"
                            >
                                View
                            </a>

                            <a
                                href="{{ route('portfolios.edit', $portfolio->id) }}"
                                class="action-btn"
                            >
                                Edit
                            </a>

                            <form
                                action="{{ route('portfolios.destroy', $portfolio->id) }}"
                                method="POST"
                                class="delete-form"
                                onsubmit="return confirm('Delete this portfolio? This cannot be undone.')"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="action-btn delete-btn"
                                >
                                    Delete
                                </button>
                            </form>

                        </div>

                    </div>

                </article>

                @if ($loop->last)
                    </div>
                @endif

            @empty

                <!-- EMPTY STATE -->
                <div class="empty-state">


                    <h3>Your portfolio journey starts here</h3>

                    <p>
                        You haven't created a portfolio yet. Start building
                        one to showcase your skills, projects, and experience.
                    </p>

                    <a
                        href="{{ route('portfolios.create') }}"
                        class="create-btn empty-create"
                    >
                        <span class="create-plus">+</span>
                        Create Your First Portfolio
                    </a>

                </div>

            @endforelse

        </section>

    </main>

</body>
</html>
