<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Berita - Admin Panel</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
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

    <script>
        document.addEventListener('trix-attachment-add', function(event) {
            let attachment = event.attachment;
            if (attachment.file) {
                let formData = new FormData();
                formData.append('file', attachment.file);
                formData.append('_token', '{{ csrf_token() }}'); // CSRF Token

                fetch('{{ route("admin.berita.upload-trix") }}', {
                    method: 'POST',
                    body: formData
                }).then(response => response.json())
                .then(data => {
                    attachment.setAttributes({
                        url: data.url,
                        href: data.url
                    });
                }).catch(error => {
                    console.error('Upload error:', error);
                });
            }
        });
    </script>
</head>
<body>
    <div class="admin-layout">
        <aside class="sidebar">
            <h2>Admin Panel</h2>
            
            <ul>
                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('admin.guru.index') }}">Kelola Guru</a></li>
                <li><a href="{{ route('admin.berita.index') }}">Kelola Berita</a></li>
                <li><a href="{{ route('admin.kategori.index') }}">Kelola Kategori</a></li> 
                <li><a href="{{ route('admin.users.index') }}">Kelola Admin</a></li>   
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
                        <input type="text" id="judul" name="judul" value="{{ old('judul') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="kategori_id">Kategori</label>
                        <select id="kategori_id" name="kategori_id" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="kutipan">Kutipan (Ringkasan Singkat)</label>
                        <input type="text" id="kutipan" name="kutipan" value="{{ old('kutipan') }}">
                    </div>

                    <!-- <div class="form-group">
                        <label for="konten">Isi Konten</label>
                        <textarea id="konten" name="konten" required>{{ old('konten') }}</textarea>
                    </div> -->
                    

                    <div class="form-group">
                        <label for="konten">Isi Konten</label>
                        <input id="konten" type="hidden" name="konten" value="{{ old('konten') }}">
                        <trix-editor input="konten" style="min-height: 300px;"></trix-editor>
                    </div>


                    <div class="form-group">
                        <label for="gambar_utama">Gambar Utama</label>
                        <input type="file" id="gambar_utama" name="gambar_utama">
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" name="status" required>
                            <option value="draft">Simpan sebagai Draft</option>
                            <option value="published">Langsung Terbitkan</option>
                        </select>
                    </div>

                    <button type="submit" class="btn-submit">Simpan Berita</button>
                </form>
            </div>
        </main>
    </div>
</body>
</html>