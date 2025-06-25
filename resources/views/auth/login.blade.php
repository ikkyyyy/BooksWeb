<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Aplikasi Buku</title>

   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', sans-serif;
        }

        .login-image {
            background-image: url('{{ asset('image/bookslogin__1_-removebg-preview.png') }}');
            background-repeat: no-repeat;
            background-size: 70%;
            background-position: center;
            background-color: #f8f9fa;
            min-height: 300px;
        }

        @media (min-width: 768px) {
            .login-image {
                min-height: 100vh;
                background-size: 70%;
            }
        }

        .login-form-wrapper {
            width: 100%;
            max-width: 480px;
            padding: 2rem;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.08);
            margin: auto;
        }

        .form-title {
            font-weight: bold;
            margin-bottom: 2rem;
            font-size: 1.5rem;
            color: #0d6efd;
        }

        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, .25);
        }

        .btn-primary {
            background-color: #0d6efd;
            border: none;
            font-size: 1.1rem;
        }

        .text-small {
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

<div class="container-fluid login-container d-flex flex-column flex-md-row">

    <div class="col-md-6 login-image d-none d-md-block"></div>


    <div class="col-md-6 d-flex align-items-center justify-content-center p-4">
        <div class="login-form-wrapper">
            <h4 class="form-title text-center">Masuk ke Aplikasi Buku</h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li class="text-small">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control form-control-lg" id="email" name="email"
                           value="{{ old('email') }}" required autofocus>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Kata Sandi</label>
                    <input type="password" class="form-control form-control-lg" id="password" name="password"
                           required>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                    <label class="form-check-label" for="remember_me">Ingat saya</label>
                </div>

                <div class="mb-3 d-flex justify-content-between align-items-center">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-decoration-none text-muted text-small">Lupa kata sandi?</a>
                    @endif
                </div>

                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary py-2">Masuk</button>
                </div>

                <div class="text-center mt-3 text-small">
                    Belum punya akun? <a href="{{ route('register') }}" class="text-decoration-none text-primary">Daftar Sekarang</a>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
