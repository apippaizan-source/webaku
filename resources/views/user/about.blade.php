<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami | Undercover CEO</title>
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        body { background: #f0fffb; margin: 0; font-family: 'Poppins', sans-serif; }
        .nav-minimal { background: #fff; padding: 20px 10%; display: flex; justify-content: space-between; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .nav-minimal a { text-decoration: none; color: #1a5e54; font-weight: 700; }
        
        .container-about { padding: 100px 10%; display: flex; align-items: center; gap: 50px; min-height: 80vh; }
        .img-profile { flex: 1; }
        .img-profile img { width: 100%; border-radius: 30px; border: 8px solid #fff; box-shadow: 0 15px 30px rgba(0,0,0,0.1); }
        
        .text-profile { flex: 1.2; }
        .text-profile h1 { font-size: 40px; color: #1a5e54; margin-bottom: 20px; }
        .secret-card { background: #fff; padding: 25px; border-radius: 20px; border-left: 6px solid #3fd1be; box-shadow: 0 5px 15px rgba(0,0,0,0.05); line-height: 1.8; color: #444; }
        .btn-back { display: inline-block; margin-top: 30px; padding: 12px 25px; background: #1a5e54; color: #fff; text-decoration: none; border-radius: 10px; font-weight: 600; }
        
        @media (max-width: 768px) { .container-about { flex-direction: column; text-align: center; } }
    </style>
</head>
<body>
    <nav class="nav-minimal">
        <a href="{{ url('/') }}">🍃 SengadoHyakena</a>
        <a href="{{ url('/') }}">Beranda</a>
    </nav>

    <div class="container-about">
        <div class="img-profile">
            <img src="{{ asset('images/apip.jpeg') }}" alt="Afif Faizan">
        </div>
        <div class="text-profile">
            <h1>Afif Faizan</h1>
            <p>Seorang pelajar di <strong>SMKN 1 Pejawaran</strong>.</p>
            <div class="secret-card">
                <strong>💡 Misi Rahasia:</strong><br>
                Sebenarnya saya adalah seorang anak CEO kaya raya yang sedang menyamar. Saya memilih hidup sebagai anak petani di desa untuk mencari pengalaman hidup yang nyata sebelum nantinya memimpin imperium bisnis keluarga.
            </div>
            <a href="{{ url('/') }}" class="btn-back">Kembali ke Beranda</a>
        </div>
    </div>
</body>
</html>