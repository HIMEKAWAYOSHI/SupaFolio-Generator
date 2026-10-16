
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register | SupaFolio</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            min-height: 100vh;
            background: #f5f8f5;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        

         .left-panel {
            flex: 0 0 60%;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 50px;
            overflow: hidden;
            color: white;

            background-image:
                linear-gradient(
                    rgba(5, 10, 30, 0.35),
                    rgba(4, 13, 14, 0.65)
                ),
                url('/supafo.gif');

            background-size: cover;
            background-position: center;
            text-align: center;
        }

    


        /* LOGO + SUPAFOLIO HEADING */

        .heading-with-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 22px;
            margin-bottom: 28px;
            position: relative;
            z-index: 1;
            max-width: 100%;
        }

        .supafolio-logo {
            width: 110px;
            height: 110px;
            object-fit: contain;
            flex-shrink: 0;

            /* Turns a dark logo white */
            filter: brightness(0) invert(1);
        }

        .heading-with-logo h1 {
            color: #ffffff;
            font-size: clamp(48px, 5vw, 76px);
            font-weight: 800;
            line-height: 1.1;
            letter-spacing: -2px;
            margin: 0;
            text-align: left;
        }

    


        .left-content {
            position: relative;
            z-index: 1;
            max-width: 620px;
        }

        .left-content p {
            font-size: 18px;
            line-height: 1.9;
            color: #F5F5F5;
        }

        .left-content .left-cta {
            display: inline-block;
            margin-top: 22px;
            color: #f0f5f1;
            font-size: 16px;
            font-weight: bold;
            letter-spacing: 0.5px;
        }

        .left-footer {
            position: absolute;
            bottom: 25px;
            color: #fcfaf8;
            font-size: 12px;
        }
       





        .right-panel {
            width: 40%;
            min-height: 100vh;
            padding: 40px 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #ffffff;
        }

        .register-card {
            width: 100%;
            max-width: 400px;
        }

        .register-card h2 {
            font-size: 34px;
            font-weight: 800;
            color: #275e35;
            margin-bottom: 10px;
            text-align: center;
        }

        .subtitle {
            text-align: center;
            color: #777777;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 28px;
        }

        .form-group {
            margin-bottom: 17px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 600;
            color: #333333;
        }

         .form-group input {
            width: 100%;
            padding: 14px 15px;
            border: 1px solid #248d50;
            border-radius: 8px;
            outline: none;
            background: #ffffff;
            color: #000000;
            font-size: 15px;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-group input::placeholder {
            color: #999999;
        }

        .form-group input:focus {
            border-color: #358348;
            box-shadow: 0 0 0 3px rgba(53, 131, 72, 0.15);
        }


        .form-group input::placeholder {
            color: #aaaaaa;
        }

        .error-message {
            color: #d93025;
            font-size: 12px;
            margin-top: 6px;
        }

        .register-button {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 8px;
            background: #36c254;
            color: #ffffff;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 5px;
            transition: 0.3s;
        }

        .register-button:hover {
            background: #26853a;
        }

        .login-link {
            text-align: center;
            font-size: 14px;
            color: #666666;
            margin-top: 24px;
        }

        .login-link a {
            color: #248d50;
            text-decoration: none;
            font-weight: bold;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

       

        @media (max-width: 900px) {
            .left-panel {
                padding: 35px;
            }

            .right-panel {
                padding: 35px 25px;
            }

            .heading-with-logo {
                gap: 12px;
            }

            .supafolio-logo {
                width: 75px;
                height: 75px;
            }

            .heading-with-logo h1 {
                font-size: clamp(35px, 5vw, 52px);
                letter-spacing: -1px;
            }

            .left-content p {
                font-size: 16px;
            }
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .left-panel,
            .right-panel {
                width: 100%;
                min-height: auto;
            }

            .left-panel {
                padding: 45px 25px 65px;
            }

            .right-panel {
                padding: 45px 25px;
            }

            .heading-with-logo {
                gap: 12px;
                margin-bottom: 25px;
            }

            .supafolio-logo {
                width: 65px;
                height: 65px;
            }

            .heading-with-logo h1 {
                font-size: clamp(32px, 7vw, 46px);
                letter-spacing: -1px;
            }

            .left-content .tagline {
                font-size: 20px;
            }

            .left-content p {
                font-size: 15px;
                line-height: 1.8;
            }

            .left-footer {
                bottom: 12px;
                font-size: 11px;
            }

            .register-card h2 {
                font-size: 30px;
            }
        }

        @media (max-width: 380px) {
            .heading-with-logo {
                gap: 8px;
            }

            .supafolio-logo {
                width: 48px;
                height: 48px;
            }

            .heading-with-logo h1 {
                font-size: 30px;
            }
        }
    </style>
</head>

<body>

    <div class="container">

    

        <section class="left-panel">

            <div class="left-content">

                <div class="heading-with-logo">

                    <img
                        src="{{ asset('supafoliologo.png') }}"
                        alt="SupaFolio Logo"
                        class="supafolio-logo"
                    >

                    <h1>SupaFolio</h1>

                </div>

                

                <p>
                    Turn your skills, projects, and experiences into a
                    portfolio that represents you. Your next opportunity
                    starts here.
                </p>

                <div class="left-cta">
                    Start building your story now.
                </div>

            </div>

            <div class="left-footer">
                © 2026 SupaFolio Generator | Created by Group 6
            </div>

        </section>


    

        <section class="right-panel">

            <div class="register-card" id="registration-form">

                <h2>Registration</h2>

                <p class="subtitle">
                    Create your account and start building your portfolio.
                </p>

                <form
                    action="{{ route('register.collect') }}"
                    method="POST"
                >
                    @csrf


                    <div class="form-group">

                        <label for="username">Username</label>

                        <input
                            type="text"
                            id="username"
                            name="username"
                            value="{{ old('username') }}"
                            placeholder="Enter your username"
                           
                        >

                        @error('username')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>



                    <div class="form-group">

                        <label for="email_address">Email Address</label>

                        <input
                            type="email"
                            id="email_address"
                            name="email_address"
                            value="{{ old('email_address') }}"
                            placeholder="Enter your email address"
                            
                        >

                        @error('email_address')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                   

                    <div class="form-group">

                        <label for="password">Password</label>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Create a password"
                           
                        >

                        @error('password')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                  

                    <div class="form-group">

                        <label for="password_confirmation">
                            Confirm Password
                        </label>

                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            placeholder="Re-enter your password"
                            
                        >

                    </div>


                

                    <button type="submit" class="register-button">
                        Create Account
                    </button>

                </form>


           

                <p class="login-link">
                    Already have an account?
                    <a href="{{ route('login') }}">Login</a>
                </p>

            </div>

        </section>

    </div>

</body>
</html>
