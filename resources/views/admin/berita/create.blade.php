<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Berita - Admin Panel</title>
    {{-- Menggunakan style yang sama dengan dashboard --}}
    <style>
        body { font-family: sans-serif; margin: 0; background-color: #f4f7f6; }
        .admin-layout { display: flex; }
        .sidebar { width: 250px; background-color: #2c3e50; color: white; min-height: 100vh; padding: 20px; }
        .sidebar h2 { text-align: center; }
        .sidebar ul { list-style: none; padding: 0; }
        .sidebar ul li a { display: block; color: white; padding: 15px; text-decoration: none; border-radius: 5px; margin-bottom: 10px; }
        .sidebar ul li a:hover, .sidebar ul li a.active { background-color: #34495e; }
        .main-content { flex-grow: 1; padding: 40px; }
        .form-container { background-color: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; }
        .form-group input, .form-group textarea { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box; }
        .form-group textarea { min-height: 250px; resize: vertical; }
        .btn-submit { padding: 10px 20px; background-color: #3498db; color: white; border: none; border-radius: 5px; cursor: pointer; }
        .btn-back { display: inline-block; margin-bottom: 20px; color: #333; }
    </style>
</head>
<body>
    <div class="admin-layout">
        <aside class="sidebar">
            <h2>Admin Panel</h2>
            <ul>
                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('admin.guru.index') }}">Kelola Guru</a></li>
                <li><a href="{{ route('admin.berita.index') }}" class="active">Kelola Berita</a></li>
            </ul>
            <form class="logout-form" method="POST" action="{{ route('logout') }}" style="margin-top: 40px;">
                @csrf
                <button type="submit" style="width: 100%; padding: 10px; background-color: #e74c3c; color: white; border: none; border-radius: 5px; cursor: pointer;">Logout</button>
            </form>
        </aside>

        <main class="main-content">
            <a href="{{ route('admin.berita.index') }}" class="btn-back">&larr; Kembali ke Daftar Berita</a>
            <h1>Tulis Berita Baru</h1>
            
            <div class="form-container">
                <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="judul">Judul Berita</label>
                        <input type="text" id="judul" name="judul" required>
                    </div>
                    <div class="form-group">
                        <label for="konten">Isi Konten</label>
                        <textarea id="konten" name="konten" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="gambar_header">Gambar Header</label>
                        <input type="file" id="gambar_header" name="gambar_header">
                        @error('gambar_header')
                            <div style="color: red; font-size: 0.9em; margin-top: 5px;">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn-submit">Terbitkan</button>
                </form>
            </div>
        </main>
    </div>
</body>
</html>