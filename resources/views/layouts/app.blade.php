<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Buku | {{ $title ?? config('app.name') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">


    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }
        main {
            padding: 2rem 0;
        }
        footer {
            text-align: center;
            padding: 1rem;
            background: #f1f1f1;
            color: #777;
        }
    </style>
</head>
<body>
    
    @include('layouts.navigation')

    @hasSection('header')
        <header class="bg-white shadow-sm border-bottom mb-3">
            <div class="container py-3">
                @yield('header')
            </div>
        </header>
    @elseif (isset($header))
        <header class="bg-white shadow-sm border-bottom mb-3">
            <div class="container py-3">
                {{ $header }}
            </div>
        </header>
    @endif

    <main class="container">
     
        {{ $slot ?? '' }}

     
        @yield('content')
    </main>

   
    <footer>
        &copy; {{ date('Y') }} Aplikasi Buku. All rights reserved.
    </footer>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>
