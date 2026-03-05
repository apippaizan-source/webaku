<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Travel With Cendet') }}</title>

    {{-- CSS HERO --}}
    <link rel="stylesheet" href="{{ asset('css/hero.css') }}">

    {{-- Tailwind (punya Breeze) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    {{-- NAVBAR --}}
    <nav class="navbar">
        <div class="nav-left">
            <h2>Travel With Cendet</h2>
        </div>

        <div class="nav-right">
            <a href="{{ url('/') }}">Home</a>

            @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button>Logout</button>
            </form>
            @endauth
        </div>
    </nav>

    {{-- CONTENT --}}
    <main>
        {{ $slot }}
    </main>

</body>
</html>
