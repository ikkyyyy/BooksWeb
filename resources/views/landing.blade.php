<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang | Aplikasi Buku</title>

  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
        }

        .hero {
            min-height: 100vh;  
            background: url('{{ asset('image/backroundbooks.jpg') }}') no-repeat center center;

            background-size: cover;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
        }

        .overlay {
            background-color: rgba(0, 0, 0, 0.5);
            position: absolute;
            inset: 0;
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
            padding: 2rem;
        }

        .hero-content h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .hero-content p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        .btn-primary, .btn-light {
            font-size: 1.1rem;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            margin: 0.5rem;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }

        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2.4rem;
            }
            .hero-content p {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>

<div class="hero">
    <div class="overlay"></div>
    <div class="hero-content animate__animated animate__fadeInUp">
        <h1>Selamat Datang di Aplikasi Buku</h1>
        <p>Kelola dan temukan buku favoritmu dengan mudah dan menyenangkan.</p>
        <a href="{{ route('login') }}" class="btn btn-light text-primary fw-semibold">Masuk</a>
        <a href="{{ route('register') }}" class="btn btn-primary fw-semibold">Daftar</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
