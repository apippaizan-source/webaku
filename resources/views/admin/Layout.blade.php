<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>

    <!-- CSS ADMIN -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>

<!-- ================= NAVBAR ================= -->
<nav class="navbar">
    <div class="navbar-left">
        <h2>Admin Sengado</h2>
    </div>

    <div class="navbar-right">
        <a href="{{ url('/') }}" class="nav-link">
            🌍 Halaman User
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="logout-btn">🚪 Logout</button>
        </form>
    </div>
</nav>
<!-- =============== END NAVBAR =============== -->

<!-- ================= CONTENT ================= -->
<div class="container">
    @yield('content')
</div>
<!-- =============== END CONTENT =============== -->

</body>
</html>
