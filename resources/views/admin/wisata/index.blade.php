<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Sengado</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>

<nav class="admin-navbar">
    <div class="nav-container">
        <div class="logo-text">SengadoHyakena <strong>Admin</strong></div>
        <div class="nav-right">
            <a href="{{ url('/') }}" class="nav-link">👁️ Lihat Website</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn-logout">Logout 🚪</button>
            </form>
        </div>
    </div>
</nav>

<div class="admin-container">
    <div class="page-header">
        <h1>📍 Data Wisata</h1>
        <a href="{{ route('admin.wisata.create') }}" class="btn-tambah">+ Tambah Wisata</a>
    </div>

    @if(session('success'))
        <div style="background: #d1fae5; color: #065f46; padding: 15px; border-radius: 12px; margin-bottom: 20px; font-weight: 600;">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-card">
        <table class="wisata-table">
            <thead>
                <tr>
                    <th width="15%">Gambar</th>
                    <th width="20%">Nama</th>
                    <th width="15%">Kategori</th>
                    <th width="30%">Lokasi</th>
                    <th width="20%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($wisatas as $wisata)
                <tr>
                    <td>
                        <div class="img-wrapper">
                            <img src="{{ asset('storage/'.$wisata->gambar) }}">
                        </div>
                    </td>
                    <td><strong>{{ $wisata->nama_wisata }}</strong></td>
                    <td><span class="badge">{{ is_array($wisata->kategori) ? implode(', ', $wisata->kategori) : $wisata->kategori }}</span></td>
                    <td>{{ $wisata->lokasi }}</td>
                    <td>
                        <a href="{{ route('admin.wisata.edit', $wisata->id) }}" class="btn-edit">Edit</a>
                        <form method="POST" action="{{ route('admin.wisata.destroy', $wisata->id) }}" style="display:inline-block">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Yakin hapus?')" class="btn-delete">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>