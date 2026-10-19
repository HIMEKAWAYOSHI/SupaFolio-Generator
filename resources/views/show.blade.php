
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $portfolio->full_name }}</title>

    <style>
        body {
            margin: 0;
            min-height: 100vh;
            background: linear-gradient(
                120deg,
                #02f522c0 0%,
                #87d18b 45%,
                #28a128 100%
            );
            font-family: Arial, sans-serif;
        }

        .back-container {
            display: flex;
            justify-content: center;
            padding: 30px 20px;
        }

        .back-button {
            display: inline-block;
            padding: 12px 28px;
            background: #245c35;
            color: white;
            text-decoration: none;
            font-size: 15px;
            font-weight: bold;
            border-radius: 30px;
            border: 2px solid transparent;
            transition: background 0.3s ease,
                        transform 0.3s ease,
                        box-shadow 0.3s ease;
        }

        .back-button:hover {
            background: #174526;
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }

        .back-button:focus-visible {
            outline: 3px solid white;
            outline-offset: 3px;
        }
    </style>
</head>

<body>

    @include('template-' . $portfolio->template)

    <div class="back-container">
        <a href="{{ route('dashboard') }}" class="back-button">
            &larr; Back to Dashboard
        </a>
    </div>

</body>
</html>
