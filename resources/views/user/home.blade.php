<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sengado Hyakena Travel | Banjarnegara</title>
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

   <nav class="navbar">
        <a href="{{ url('/') }}" class="logo">
            <span>SengadoHyakena</span>
        </a>

        <div class="nav-menu">
            <div class="nav-links">
                <a href="{{ url('/') }}">Beranda</a>
                <a href="#wisata">Destinasi</a>
                <a href="{{ route('about') }}">Tentang Kami</a>
            </div>

            <div class="nav-center">
                <form action="{{ url('/') }}" method="GET" class="search-box">
                    <input type="text" name="search" placeholder="Cari aura wisata..." value="{{ request('search') }}">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>

            <div class="nav-right">
                <div class="dropdown-kategori">
                    <button class="dropbtn">Kategori <i class="fas fa-wind"></i></button>
                    <div class="dropdown-content">
                        <a href="{{ url('/') }}">Semua Wisata</a>
                        <a href="{{ url('/') }}?kategori=Budaya">Budaya</a>
                        <a href="{{ url('/') }}?kategori=Sejarah">Sejarah</a>
                        <a href="{{ url('/') }}?kategori=Alam">Alam</a>
                    </div>
                </div>
                <a href="{{ route('login') }}" class="btn-auth">Login</a>
            </div>
        </div>

        <div class="hamburger" onclick="toggleMenu()">
            <span></span><span></span><span></span>
        </div>
    </nav>

    <section class="hero">
        <video class="hero-video" autoplay muted loop playsinline>
            <source src="{{ asset('videos/hero.mp4') }}" type="video/mp4">
        </video>
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1>Banjarnegara Menanti</h1>
            <p>Jelajahi keajaiban alam yang membawa kedamaian, laksana hembusan angin di negeri abadi.</p>
            <a href="#wisata" class="btn-cta">Mulai Perjalanan <i class="fas fa-leaf"></i></a>
        </div>
    </section>

    @if(!request('kategori') && !request('search'))
    <section class="rekomendasi">
        <div class="section-title">
            <h2>✨ Destinasi Pilihan</h2>
            <p>Rekomendasi tempat dengan harmoni alam yang murni.</p>
        </div>
        <div class="grid-rekomendasi">
            @foreach($rekomendasi as $item)
            <div class="rekom-card" onclick="openPopup({{ $item->id }})">
                <div class="card-img-container">
                    <img src="{{ asset('storage/'.$item->gambar) }}">
                    <div class="card-rating"><i class="fas fa-star"></i> 4.9</div>
                </div>
                <div class="rekom-body">
                    <h4>{{ $item->nama_wisata }}</h4>
                    <p><i class="fas fa-map-marker-alt"></i> {{ $item->lokasi }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @endif

    <section class="container" id="wisata">
        <div class="section-header">
            <div class="header-text">
                <h2>
                    @if(request('kategori')) Kategori: {{ request('kategori') }}
                    @elseif(request('search')) Hasil Pencarian: "{{ request('search') }}"
                    @else Semua Destinasi Wisata
                    @endif
                </h2>
            </div>
            <div class="filter-pills">
                <a href="{{ url('/') }}" class="pill {{ !request('kategori') ? 'active' : '' }}">Semua</a>
                <a href="{{ url('/') }}?kategori=Alam" class="pill {{ request('kategori') == 'Alam' ? 'active' : '' }}">Alam</a>
                <a href="{{ url('/') }}?kategori=Budaya" class="pill {{ request('kategori') == 'Budaya' ? 'active' : '' }}">Budaya</a>
            </div>
        </div>

        <div class="grid-main">
            @forelse($wisatas as $wisata)
            <div class="card" onclick="openPopup({{ $wisata->id }})">
                <div class="card-img-container">
                    <img src="{{ asset('storage/'.$wisata->gambar) }}">
                    <div class="card-tag">Favorit</div>
                </div>
                <div class="card-body">
                    <div class="card-badges">
                        @foreach(explode(',', $wisata->kategori) as $kat)
                            <span class="badge">{{ $kat }}</span>
                        @endforeach
                    </div>
                    <h3>{{ $wisata->nama_wisata }}</h3>
                    <p class="location"><i class="fas fa-map-marker-alt"></i> {{ $wisata->lokasi }}</p>
                    <div class="card-footer-info">
                        <span class="btn-detail">Lihat Detail <i class="fas fa-chevron-right"></i></span>
                    </div>
                </div>
            </div>

            <div class="popup" id="popup-{{ $wisata->id }}">
                <div class="popup-content">
                    <div class="popup-img-side">
                         <img src="{{ asset('storage/'.$wisata->gambar) }}">
                    </div>
                    <div class="popup-text">
                        <div class="popup-header">
                            <h3>{{ $wisata->nama_wisata }}</h3>
                            <span class="popup-loc"><i class="fas fa-map-marker-alt"></i> {{ $wisata->lokasi }}</span>
                        </div>
                        <p class="desc">{{ $wisata->deskripsi }}</p>
                        <div class="popup-actions">
                            @if($wisata->latitude && $wisata->longitude)
                            <a href="https://www.google.com/maps?q={{ $wisata->latitude }},{{ $wisata->longitude }}" target="_blank" class="maps-link">
                                <i class="fas fa-location-arrow"></i> Petunjuk Arah
                            </a>
                            @endif
                            <button class="close-btn" onclick="closePopup({{ $wisata->id }})">Kembali</button>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <div class="empty-state">
                    <h3>Wisata tidak ditemukan... 🔍</h3>
                    <a href="{{ url('/') }}">Muat Ulang Halaman</a>
                </div>
            @endforelse
        </div>
    </section>

    <footer class="main-footer">
        <div class="footer-grid">
            <div class="footer-brand">
                <h3>Sengado<span>Hyakena</span></h3>
                <p>Menghadirkan harmoni antara manusia dan alam melalui perjalanan yang murni.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
            <div class="footer-nav">
                <h4>Navigasi</h4>
                <a href="#">Beranda</a>
                <a href="#">Destinasi</a>
                <a href="#">Tentang Kami</a>
            </div>
            <div class="footer-contact">
                <h4>Kontak</h4>
                <p><i class="fas fa-envelope"></i> salam@sengado.id</p>
                <p><i class="fas fa-wind"></i> Banjarnegara, Jawa Tengah</p>
            </div>
        </div>
        <div class="footer-copy">
            <p>© 2026 SengadoHyakena | Spirit of Ye Qingxian.</p>
        </div>
    </footer>

    <script>
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        function toggleMenu() {
            const menu = document.querySelector('.nav-menu');
            menu.classList.toggle('active');
        }

        function openPopup(id){
            const popup = document.getElementById('popup-'+id);
            if(popup){
                popup.style.display = 'flex';
                document.body.style.overflow = 'hidden';
            }
        }
        function closePopup(id){
            const popup = document.getElementById('popup-'+id);
            if(popup){
                popup.style.display = 'none';
                document.body.style.overflow = 'auto';
            }
        }
        window.onclick = function(event) {
            if (event.target.classList.contains('popup')) {
                event.target.style.display = "none";
                document.body.style.overflow = 'auto';
            }
        }
    </script>
</body>
</html>