
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>About SupaFolio</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            color: white;

            background-image:
                linear-gradient(
                    rgba(5, 10, 30, 0.45),
                    rgba(4, 13, 14, 0.75)
                ),
                url('/supafo.gif');

            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
        }

        a {
            text-decoration: none;
        }

      

        .back-button {
            position: absolute;
            top: 25px;
            left: 7%;

            display: inline-flex;
            align-items: center;
            gap: 8px;

            padding: 10px 17px;
            border: 1px solid rgba(255, 255, 255, 0.35);
            border-radius: 10px;

            color: white;
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);

            font-size: 14px;
            transition: 0.25s;
        }

        .back-button:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }


        .page-container {
            width: 100%;
            max-width: 1000px;
            margin: auto;
            padding: 75px 25px 50px;
        }

       

        .brand-section {
            text-align: center;
            margin-bottom: 35px;
        }

        .brand-logo {
            width: 105px;
            height: 105px;
            object-fit: contain;
            display: block;
            margin: 0 auto 12px;

            
            filter: brightness(0) invert(1);
        }

        .brand-name {
            font-size: clamp(38px, 6vw, 58px);
            font-weight: 800;
            letter-spacing: -2px;
            line-height: 1.2;
        }

       

        .tagline {
            margin-top: 12px;
            color: rgba(255, 255, 255, 0.78);
            font-size: 15px;
            letter-spacing: 1px;
        }

       
        .about-panel {
            padding: 40px 45px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;

            background: rgba(255, 255, 255, 0.09);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);

            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.2);
        }

        .section-label {
            display: inline-block;
            margin-bottom: 12px;

            color: #c7e2ce;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .about-panel h2 {
            margin-bottom: 20px;
            font-size: clamp(27px, 4vw, 36px);
            letter-spacing: -0.8px;
        }

        .description {
            color: rgba(255, 255, 255, 0.84);
            font-size: 15px;
            line-height: 1.9;
            text-align: justify;
        }

        .description p + p {
            margin-top: 16px;
        }

       

        .team-section {
            margin-top: 35px;
            padding-top: 28px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }

        .team-section h3 {
            margin-bottom: 22px;
            font-size: 22px;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
        }

        .team-member {
            display: flex;
            align-items: center;
            gap: 12px;

            padding: 14px 16px;
            min-height: 60px;

            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 10px;

            color: rgba(255, 255, 255, 0.92);
            font-size: 14px;
            line-height: 1.5;

            transition: 0.2s;
        }

        .team-member:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
        }

        .member-icon {
            width: 34px;
            height: 34px;
            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;
            background: rgba(199, 226, 206, 0.18);
            color: #d7f0dd;
            font-weight: bold;
        }

        

        .footer {
            padding-top: 28px;
            text-align: center;
            color: rgba(255, 255, 255, 0.6);
            font-size: 12px;
        }

        /* RESPONSIVE DESIGN */

        @media (max-width: 600px) {
            .page-container {
                padding: 95px 17px 30px;
            }

            .back-button {
                top: 18px;
                left: 17px;
            }

            .brand-logo {
                width: 80px;
                height: 80px;
            }

            .brand-name {
                letter-spacing: -1px;
            }

            .tagline {
                font-size: 13px;
            }

            .about-panel {
                padding: 27px 22px;
            }

            .description {
                text-align: left;
                font-size: 14px;
            }

            .team-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    
    <a href="{{ route('dashboard') }}" class="back-button">
        Back to Dashboard
    </a>


    <main class="page-container">

        <!-- CENTERED BRAND -->

        <header class="brand-section">

            <img
                src="{{ asset('supafoliologo.png') }}"
                alt="SupaFolio Logo"
                class="brand-logo"
            >

            <h1 class="brand-name">
                SupaFolio
            </h1>

            <p class="tagline">
                Your next opportunity starts here.
            </p>

        </header>


       
        <section class="about-panel">

    
            <h2>About SupaFolio</h2>

            <div class="description">

                <p>
                    SupaFolio is a web-based portfolio generator that
                    helps users create their own personal portfolios
                    in a simple and convenient way. It allows users to
                    organize and showcase their personal information,
                    education, skills, projects, and work experience in
                    one place. With three available templates, users
                    can choose a design that best represents their
                    personality and professional goals.
                </p>

                <p>
                    SupaFolio aims to make portfolio creation easier
                    and more accessible, especially for students,
                    aspiring professionals, and individuals who want
                    to present their skills and achievements. By
                    providing an organized and user-friendly platform,
                    SupaFolio helps users turn their experiences and
                    accomplishments into a portfolio they can be proud
                    to share.
                </p>

            </div>


            <!-- TEAM MEMBERS -->

            <div class="team-section">

                <span class="section-label">The People Behind the Project</span>

                <h3>Created by the Members</h3>

                <div class="team-grid">

                    <div class="team-member">
                        <span class="member-icon">P</span>
                        <span>Pacaña, John Kennery A.</span>
                    </div>

                    <div class="team-member">
                        <span class="member-icon">P</span>
                        <span>Pomicpic, Jonriel M.</span>
                    </div>

                    <div class="team-member">
                        <span class="member-icon">P</span>
                        <span>Para-asi, John Carlo S.</span>
                    </div>

                    <div class="team-member">
                        <span class="member-icon">S</span>
                        <span>Solera, Denver I.</span>
                    </div>

                    <div class="team-member">
                        <span class="member-icon">A</span>
                        <span>Abad, Joshua C.</span>
                    </div>

                    <div class="team-member">
                        <span class="member-icon">C</span>
                        <span>Carin, Geraldine O.</span>
                    </div>

                    <div class="team-member">
                        <span class="member-icon">B</span>
                        <span>Buhangin, Rhaneil S.</span>
                    </div>

                </div>

            </div>

        </section>


        <!-- FOOTER -->

        <footer class="footer">
            &copy; 2026 Final Project SupaFolio. Group 6. 
        </footer>

    </main>

</body>
</html>
