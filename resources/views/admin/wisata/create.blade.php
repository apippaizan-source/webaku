<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Wisata - Admin</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
<div class="admin-container" style="max-width: 800px;">
    <h1>✨ Tambah Destinasi</h1>
    <div class="card">
        @if ($errors->any())
            <div style="color: #d63031; margin-bottom: 20px;">
                <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
            </div>
        @endif

        <form action="{{ route('admin.wisata.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Nama Wisata</label>
                <input type="text" name="nama_wisata" value="{{ old('nama_wisata') }}" required>
            </div>

            <div class="form-group">
                <label>Kategori (Boleh lebih dari satu)</label>
                <div class="checkbox-group">
                    <label class="checkbox-item"><input type="checkbox" name="kategori[]" value="Alam"> 🌲 Alam</label>
                    <label class="checkbox-item"><input type="checkbox" name="kategori[]" value="Budaya"> 🎭 Budaya</label>
                    <label class="checkbox-item"><input type="checkbox" name="kategori[]" value="Sejarah"> 📜 Sejarah</label>
                </div>
            </div>

            <div class="form-group">
                <label>Alamat / Lokasi</label>
                <input type="text" name="lokasi" value="{{ old('lokasi') }}" required>
            </div>

            <div class="form-group">
                <label>Deskripsi Wisata</label>
                <textarea name="deskripsi" rows="5" required>{{ old('deskripsi') }}</textarea>
            </div>

            <div class="form-group">
                <label>Upload Gambar</label>
                <input type="file" name="gambar" accept="image/*" required>
            </div>

            <button type="submit" class="btn-submit">Simpan Data Wisata</button>
            <a href="{{ route('admin.wisata.index') }}" class="btn-back">Kembali ke Dashboard</a>
        </form>
    </div>
</div>
</body>
</html>