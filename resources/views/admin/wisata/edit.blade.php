<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Wisata - Admin</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
<div class="admin-container" style="max-width: 800px;">
    <h1>✏️ Edit Destinasi</h1>
    <div class="card">
        <form action="{{ route('admin.wisata.update', $wisata->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            
            <div class="form-group">
                <label>Nama Wisata</label>
                <input type="text" name="nama_wisata" value="{{ old('nama_wisata', $wisata->nama_wisata) }}" required>
            </div>

            <div class="form-group">
                <label>Kategori</label>
                <select name="kategori" required>
                    <option value="Alam" {{ $wisata->kategori == 'Alam' ? 'selected' : '' }}>🌲 Alam</option>
                    <option value="Budaya" {{ $wisata->kategori == 'Budaya' ? 'selected' : '' }}>🎭 Budaya</option>
                    <option value="Sejarah" {{ $wisata->kategori == 'Sejarah' ? 'selected' : '' }}>📜 Sejarah</option>
                </select>
            </div>

            <div class="form-group">
                <label>Lokasi</label>
                <input type="text" name="lokasi" value="{{ old('lokasi', $wisata->lokasi) }}" required>
            </div>

            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi" rows="5" required>{{ old('deskripsi', $wisata->deskripsi) }}</textarea>
            </div>

            <div class="form-group">
                <label>Gambar Saat Ini</label>
                <img src="{{ asset('storage/'.$wisata->gambar) }}" style="width: 100%; height: 200px; object-fit: cover; border-radius: 15px; margin-bottom: 10px;">
                <input type="file" name="gambar" accept="image/*">
                <small>*Biarkan kosong jika tidak ingin ganti</small>
            </div>

            <button type="submit" class="btn-submit">Update Perubahan</button>
            <a href="{{ route('admin.wisata.index') }}" class="btn-back">Batal</a>
        </form>
    </div>
</div>
</body>
</html>