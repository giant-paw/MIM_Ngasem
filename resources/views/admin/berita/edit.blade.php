<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Berita - Admin Panel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- Menggunakan style yang sama dengan create.blade.php --}}
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
        .form-group input, .form-group textarea, .form-group select { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box; }
        .form-group textarea { min-height: 250px; resize: vertical; }
        .btn-submit { padding: 10px 20px; background-color: #3498db; color: white; border: none; border-radius: 5px; cursor: pointer; }
        .btn-back { display: inline-block; margin-bottom: 20px; color: #333; }
        .current-photo { margin-top: 10px; }
        trix-editor { background-color: white; }
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
            <h1>Edit Berita</h1>
            
            <div class="form-container">
                <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') {{-- Metode WAJIB untuk update --}}
                    
                    <div class="form-group">
                        <label for="judul">Judul Berita</label>
                        <input type="text" id="judul" name="judul" value="{{ old('judul', $berita->judul) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="kategori_id">Kategori</label>
                        <select id="kategori_id" name="kategori_id" required>
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}" @selected(old('kategori_id', $berita->kategori_id) == $item->id)>
                                    {{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="kutipan">Kutipan (Ringkasan Singkat)</label>
                        <input type="text" id="kutipan" name="kutipan" value="{{ old('kutipan', $berita->kutipan) }}">
                    </div>

                    <div class="form-group">
                        <label for="konten">Isi Konten</label>
                        <input id="konten" type="hidden" name="konten" value="{{ old('konten', $berita->konten) }}">
                        <trix-editor input="konten"></trix-editor>
                    </div>
                    
                    <div class="form-group">
                        <label for="gambar_utama">Ganti Gambar Utama (Opsional)</label>
                        <input type="file" id="gambar_utama" name="gambar_utama">
                        @if ($berita->gambar_utama)
                            <div class="current-photo">
                                <p>Gambar saat ini:</p>
                                <img src="{{ Storage::url($berita->gambar_utama) }}" alt="Gambar saat ini" width="200">
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" name="status" required>
                            <option value="draft" @selected(old('status', $berita->status) == 'draft')>Simpan sebagai Draft</option>
                            <option value="published" @selected(old('status', $berita->status) == 'published')>Terbitkan</option>
                        </select>
                    </div>

                    <button type="submit" class="btn-submit">Update Berita</button>
                </form>
            </div>
        </main>
    </div>

    <script>
        // Script untuk Trix Editor upload
        document.addEventListener('trix-attachment-add', function(event) {
            let attachment = event.attachment;
            if (attachment.file) {
                let formData = new FormData();
                formData.append('file', attachment.file);
                formData.append('_token', '{{ csrf_token() }}');

                fetch('{{ route("admin.berita.upload-trix") }}', {
                    method: 'POST',
                    body: formData
                }).then(response => response.json())
                .then(data => {
                    attachment.setAttributes({
                        url: data.url,
                        href: data.url
                    });
                });
            }
        });
    </script>
</body>
</html>