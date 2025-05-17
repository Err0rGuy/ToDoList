<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Discover More - ToDo App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background: linear-gradient(135deg, #091921, #00274e, #00473b);
            font-family: 'Segoe UI', sans-serif;
            color: white;
            overflow-x: hidden;
        }

        .learn-more-container {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 4rem 2rem;
            animation: fadeIn 1.2s ease-in-out;
        }

        .learn-more-box {
            background: rgba(255, 255, 255, 0.07);
            backdrop-filter: blur(14px);
            padding: 60px;
            border-radius: 24px;
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.4);
            max-width: 850px;
            width: 100%;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .learn-more-box h1 {
            font-size: 2.8rem;
            margin-bottom: 25px;
            background: linear-gradient(to right, #00bf8f, #00a815);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
        }

        .learn-more-box p {
            font-size: 1.2rem;
            line-height: 1.9;
            color: #e0e0e0;
            margin-bottom: 30px;
        }

        .btn-get-started {
            padding: 14px 34px;
            font-size: 1.1rem;
            font-weight: 600;
            background: linear-gradient(90deg, #00bf8f, #2c5364);
            border: none;
            border-radius: 40px;
            color: white;
            transition: all 0.35s ease;
            box-shadow: 0 8px 20px rgba(0, 255, 150, 0.25);
        }

        .btn-get-started:hover {
            transform: translateY(-4px) scale(1.03);
            box-shadow: 0 12px 28px rgba(0, 255, 150, 0.35);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            .learn-more-box {
                padding: 40px 25px;
            }

            .learn-more-box h1 {
                font-size: 2.2rem;
            }

            .learn-more-box p {
                font-size: 1.05rem;
            }
        }
    </style>
</head>
<body>

<div class="learn-more-container">
    <div class="learn-more-box">
        <h1>Smarter Tasks. Sleeker Life.</h1>
        <p>
            Elevate your day-to-day with our ultra-intuitive ToDo app — a tool designed for elegance, speed, and effortless productivity.
            Whether you're juggling work projects or personal dreams, stay on track with real-time syncing, minimalist design, and seamless usability.
        </p>
        <p>
            Stay organized. Feel accomplished. Live empowered.
        </p>
        <a href="{{route('dashboard')}}" class="btn btn-get-started mt-3">Let’s Go →</a>
    </div>
</div>

</body>
</html>
