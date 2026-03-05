<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sengado Travel - Daftar</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
    <div class="container active" id="authBox">
        
        <div class="form-box register">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <h2>Buat Akun</h2>
                <div class="input-group"><input type="text" name="name" placeholder="Nama Lengkap" required></div>
                <div class="input-group"><input type="email" name="email" placeholder="Email" required></div>
                <div class="input-group"><input type="password" name="password" placeholder="Password" required></div>
                <div class="input-group"><input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required></div>
                <button type="submit" class="btn">Daftar Sekarang</button>
            </form>
        </div>

        <div class="form-box login">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <h2>Selamat Datang</h2>
                <div class="input-group"><input type="email" name="email" placeholder="Email" required></div>
                <div class="input-group"><input type="password" name="password" placeholder="Password" required></div>
                <button type="submit" class="btn">Masuk</button>
            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Selamat Datang Kembali!</h1>
                    <p>Masuk untuk melihat destinasi pilihanmu.</p>
                    <button class="ghost" onclick="switchMode('{{ route('login') }}')">Masuk</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Ayo Bergabung!</h1>
                    <p>Mulai perjalanan magismu sekarang juga.</p>
                    <button class="ghost" onclick="switchMode('{{ route('register') }}')">Daftar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/auth.js') }}"></script>
</body>
</html>