
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | SupaFolio</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            min-height: 100vh;
            background: #fffdfb;
        }

        .login-page {
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
            flex: 0 0 40%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 25px;
            background: #fffdfb;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
        }

        .login-header {
            margin-bottom: 30px;
        }

        .login-header h2 {
            color: #358348;
            font-size: 32px;
            margin-bottom: 10px;
        }

        .login-header p {
            color: #275e35;
            font-size: 15px;
            line-height: 1.6;
        }

        .login-card {
            background: #f9fbfc;
            padding: 30px;
            border-radius: 12px;
            border: 1px solid #0d723a;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            color: #000000;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
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

        .error-message {
            color: #B42318;
            font-size: 13px;
            margin-top: 7px;
        }

        

        .login-button {
            width: 100%;
            padding: 14px;
            border: 1px solid #45fc6d;
            border-radius: 8px;
            background: #36c254;
            color: #ffffff;
            font-size: 17px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.2s,
                        box-shadow 0.2s,
                        transform 0.2s;
        }

        .login-button:hover {
            background: #26853a;
            border-color: #26853a;
            box-shadow: 0 4px 12px rgba(53, 131, 72, 0.2);
        }

        .login-button:active {
            transform: scale(0.98);
        }

        

        .register-link {
            text-align: center;
            margin-top: 25px;
            color: #030303;
            font-size: 14px;
            line-height: 1.8;
        }

        .register-link a {
            color: #275e35;
            font-weight: bold;
            text-decoration: none;
            transition: color 0.2s;
        }

        .register-link a:hover {
            color: #3eac4c;
            text-decoration: underline;
        }

        

        @media (max-width: 768px) {
            .login-page {
                flex-direction: column;
            }

            .left-panel {
                flex: none;
                min-height: 300px;
                padding: 75px 25px 45px;
            }

            .brand {
                top: 20px;
                left: 20px;
                font-size: 18px;
            }

            .heading-with-logo {
                gap: 12px;
                margin-bottom: 20px;
            }

            .supafolio-logo {
                width: 65px;
                height: 65px;
            }

            .heading-with-logo h1 {
                font-size: clamp(32px, 7vw, 46px);
                letter-spacing: -1px;
            }

            .left-content p {
                font-size: 14px;
                line-height: 1.8;
            }

            .left-content .left-cta {
                font-size: 14px;
                margin-top: 16px;
            }

            .left-footer {
                display: none;
            }

            .right-panel {
                flex: 1;
                padding: 35px 20px;
            }

            .login-header h2 {
                font-size: 28px;
            }

            .login-card {
                padding: 25px 20px;
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

    <div class="login-page">

        
        <section class="left-panel">

           

            <div class="heading-with-logo">
                <img
                    src="{{ asset('supafoliologo.png') }}"
                    alt="SupaFolio Logo"
                    class="supafolio-logo"
                >

                <h1>SupaFolio</h1>
            </div>

            <div class="left-content">
                <p>
                    Turn your skills, projects, and experiences
                    into a portfolio that represents you.
                    Your next opportunity starts here.
                </p>

                <div class="left-cta">
                    Start building your story now.
                </div>
            </div>

            <div class="left-footer">
                &copy; 2026 SupaFolio Generator | Created by Group 6
            </div>

        </section>

        
        <section class="right-panel">

            <div class="login-container">

                <div class="login-header">
                    <h2>Login to SupaFolio</h2>
                    <p>Welcome! Continue building your story.</p>
                </div>

                <div class="login-card">

                    <form action="{{ route('login.attempt') }}" method="POST">
                        @csrf

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
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>

                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="Enter your password"
                            >

                            @error('password')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="login-button">
                            Log In
                        </button>

                    </form>

                    <div class="register-link">
                        <p>No account yet?</p>
                        <a href="{{ route('register') }}">Create an Account</a>
                    </div>

                </div>

            </div>

        </section>

    </div>

</body>
</html>
