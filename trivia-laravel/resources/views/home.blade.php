<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trivia Game</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        header {
            background-color: #24019b;
            color: white;
            padding: 50px 0;
        }
        h1 {
            margin: 0;
        }
        .cta-btn {
            background-color: #ffb238;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 18px;
        }
        .cta-btn:hover {
            background-color: #392c9f;
        }
        .content {
            padding: 40px 20px;
        }
        footer {
            background-color: #24019b;
            color: white;
            padding: 20px 0;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to the {{ env('APP_NAME') }}!</h1>
        <p>Test your knowledge and have fun!</p>
    </header>

    <div class="content">
        <h2>Ready to play {{ env('APP_NAME') }}?</h2>
        <p>Sign up and start your trivia adventure today!</p>
        <a href="{{ route('game.start') }}" class="cta-btn">Start Game</a>
    </div>

    <footer>
        <p>&copy; 2025 Trivia Game. All rights reserved.</p>
    </footer>
</body>
</html>
