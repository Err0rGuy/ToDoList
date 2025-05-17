<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Welcome - ToDo App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #091921, #00274e, #00473b);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .content-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            padding: 20px;
        }

        .welcome-box {
            padding: 60px 50px;
            min-height: 450px;
            width: 100%;
            max-width: 600px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            border: 2px solid transparent;
            background-clip: padding-box;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(10px);
            animation: fadeSlideUp 1s ease-out;
            text-align: center;
            position: relative;
        }

        .welcome-box::before {
            content: "";
            position: absolute;
            inset: -2px;
            z-index: -1;
            border-radius: inherit;
            background: linear-gradient(135deg, #00c9a7, #004e92);
            animation: glowBorder 6s linear infinite;
        }

        @keyframes glowBorder {
            0% { filter: hue-rotate(0deg); }
            100% { filter: hue-rotate(360deg); }
        }

        .welcome-box h1 {
            font-size: 2.4rem;
            margin-bottom: 60px;
        }

        .welcome-box h5 {
            font-weight: 300;
            color: #e0f7fa;
            margin-bottom: 20px;
        }

        .welcome-box p {
            font-size: 1.1rem;
            color: #cfeaf0;
            margin-bottom: 30px;
            line-height: 1.5;
        }

        .btn-custom {
            min-width: 150px;
            margin: 10px;
            padding: 12px 24px;
            border-radius: 30px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-success {
            background-color: #00c9a7;
            border: none;
        }

        .btn-success:hover {
            background-color: #00b594;
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(0, 255, 150, 0.3);
        }

        .btn-outline-light:hover {
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }

        @keyframes fadeSlideUp {
            from {
                opacity: 0;
                transform: translateY(60px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            .welcome-box {
                padding: 40px 25px;
            }

            .welcome-box h1 {
                font-size: 2rem;
            }

            .welcome-box h5 {
                font-size: 1rem;
            }

            .welcome-box p {
                font-size: 0.95rem;
            }

            .btn-custom {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<div class="content-wrapper">
    <div class="welcome-box">
        <h1>Welcome to Your ToDo List!</h1>
        <h5>Organize. Simplify. Dominate your day.</h5>
        <p>
            This app helps you manage tasks effortlessly. Plan your day, set goals, and stay productive
            with a clean and elegant interface designed for focus.
        </p>
        <a href="{{route('dashboard')}}" class="btn btn-success btn-custom">Get Started</a>
        <a href="{{route('learn.more')}}" class="btn btn-outline-light btn-custom">Learn More</a>
    </div>
</div>

</body>
</html>



