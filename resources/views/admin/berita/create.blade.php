<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($berita) ? 'Edit Berita' : 'Tambah Berita' }} - Admin Panel</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        /* --- CSS VARIABLES & RESET --- */
        :root {
            --primary-color: #4f46e5;
            --primary-hover: #4338ca;
            --secondary-color: #1f2937;
            --sidebar-bg: #111827;
            --body-bg: #f8f9fa;
            --card-bg: #ffffff;
            --text-color: #4b5563;
            --text-light: #d1d5db;
            --border-color: #e5e7eb;
            --danger-text: #991b1b;
            --logout-button : #cf0505ff;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--body-bg);
            color: var(--text-color);
        }
        
        a { text-decoration: none; }
        ul { list-style: none; }

        /* --- ADMIN LAYOUT (Sama seperti halaman lain) --- */
        .admin-layout { display: flex; }
        .sidebar { width: 260px; background-color: var(--sidebar-bg); color: var(--text-light); min-height: 100vh; display: flex; flex-direction: column; }
        .sidebar-header { padding: 1.5rem; text-align: center; font-size: 1.5rem; font-weight: 700; color: var(--card-bg); border-bottom: 1px solid var(--secondary-color); }
        .sidebar-nav { flex-grow: 1; padding: 1rem; }
        .sidebar-nav a { display: flex; align-items: center; gap: 12px; padding: 12px 15px; border-radius: 8px; color: var(--text-light); margin-bottom: 8px; font-weight: 500; transition: background-color 0.2s ease, color 0.2s ease; }
        .sidebar-nav a .icon { font-size: 1.1rem; width: 20px; text-align: center; }
        .sidebar-nav a:hover, .sidebar-nav a.active { background-color: var(--primary-color); color: var(--card-bg); }
        .sidebar-footer { padding: 1.5rem; }
        

        .btn-logout:hover { background-color: #374151; }
        .content-wrapper { flex-grow: 1; display: flex; flex-direction: column; }
        .main-header { background-color: var(--card-bg); padding: 1rem 2.5rem; border-bottom: 1px solid var(--border-color); display: flex; justify-content: space-between; align-items: center; }
        .main-header h1 { font-size: 1.75rem; font-weight: 600; color: var(--secondary-color); }
        .main-content { padding: 2.5rem; flex-grow: 1; }
        .card { background-color: var(--card-bg); padding: 2rem; border-radius: 12px; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1); }

        /* --- FORM STYLING --- */
        .form-group { margin-bottom: 1.5rem; }
        .form-group label { display: block; margin-bottom: 0.5rem; font-weight: 600; font-size: 0.875rem; color: var(--secondary-color); }
        .form-control { width: 100%; padding: 12px 15px; border: 1px solid var(--border-color); border-radius: 8px; font-family: 'Poppins', sans-serif; font-size: 1rem; transition: border-color 0.2s ease, box-shadow 0.2s ease; background-color: white; }
        .form-control:focus { outline: none; border-color: var(--primary-color); box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2); }
        .form-control-file { padding: 8px; }
        .form-error { color: var(--danger-text); font-size: 0.875em; margin-top: 5px; }
        .form-actions { display: flex; justify-content: flex-end; gap: 1rem; margin-top: 2rem; padding-top: 1.5rem; border-top: 1px solid var(--border-color); }

        /* --- TRIX EDITOR STYLING --- */
        trix-editor {
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 1rem;
            min-height: 300px;
        }
        trix-editor:focus-within {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
        }
        .trix-button-group {
            border-bottom: 1px solid var(--border-color) !important;
            margin-bottom: 10px !important;
            padding-bottom: 10px !important;
        }

        /* --- BUTTONS --- */
        .btn { display: inline-flex; align-items: center; gap: 0.5rem; padding: 10px 20px; border-radius: 8px; font-weight: 600; font-family: 'Poppins', sans-serif; cursor: pointer; border: none; transition: background-color 0.2s ease, transform 0.1s ease; }
        .btn:active { transform: scale(0.98); }
        .btn-primary { background-color: var(--primary-color); color: white; }
        .btn-primary:hover { background-color: var(--primary-hover); }
        .btn-secondary { background-color: var(--border-color); color: var(--secondary-color); }
        .btn-secondary:hover { background-color: #d1d5db; }
        .btn-logout {
            width: 100%;
            padding: 12px;
            background-color: var(--logout-button);
            color: #ffffffff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            transition: background-color 0.2s ease;
        }
    </style>
</head>
<body>
    <div class="admin-layout">
        <aside class="sidebar">
            <div class="sidebar-header">
                Admin Panel
            </div>
            <ul class="sidebar-nav">
                <li><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt icon"></i> Dashboard</a></li>
                <li><a href="{{ route('admin.guru.index') }}"><i class="fas fa-chalkboard-teacher icon"></i> Kelola Guru</a></li>
                <li><a href="{{ route('admin.berita.index') }}" class="active"><i class="fas fa-newspaper icon"></i> Kelola Berita</a></li>
                <li><a href="{{ route('admin.kategori.index') }}"><i class="fas fa-tags icon"></i> Kelola Kategori</a></li>
                <li><a href="{{ route('admin.users.index') }}"><i class="fas fa-users-cog icon"></i> Kelola Admin</a></li>
            </ul>
            <div class="sidebar-footer">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn-logout">Logout</button>
                </form>
            </div>
        </aside>

        <div class="content-wrapper">
            <header class="main-header">
                <h1>{{ isset($berita) ? 'Edit Berita' : 'Tulis Berita Baru' }}</h1>
            </header>
            
            <main class="main-content">
                <div class="card">
                    <form action="{{ isset($berita) ? route('admin.berita.update', $berita->id) : route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(isset($berita))
                            @method('PUT')
                        @endif

                        <div class="form-group">
                            <label for="judul">Judul Berita</label>
                            <input type="text" id="judul" name="judul" class="form-control" value="{{ old('judul', $berita->judul ?? '') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="kategori_id">Kategori</label>
                            <select id="kategori_id" name="kategori_id" class="form-control" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->id }}" {{ (isset($berita) && $berita->kategori_id == $item->id) || old('kategori_id') == $item->id ? 'selected' : '' }}>
                                        {{ $item->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="kutipan">Kutipan (Ringkasan Singkat)</label>
                            <input type="text" id="kutipan" name="kutipan" class="form-control" value="{{ old('kutipan', $berita->kutipan ?? '') }}">
                        </div>

                        <div class="form-group">
                            <label for="konten">Isi Konten</label>
                            <input id="konten" type="hidden" name="konten" value="{{ old('konten', $berita->konten ?? '') }}">
                            <trix-editor input="konten"></trix-editor>
                        </div>

                        <div class="form-group">
                            <label for="gambar_utama">Gambar Utama (Thumbnail)</label>
                            <input type="file" id="gambar_utama" name="gambar_utama" class="form-control form-control-file">
                             @if(isset($berita) && $berita->gambar_utama)
                                <small style="display: block; margin-top: 10px;">Gambar saat ini: <a href="{{ asset('storage/' . $berita->gambar_utama) }}" target="_blank">Lihat gambar</a></small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" name="status" class="form-control" required>
                                <option value="draft" {{ (isset($berita) && $berita->status == 'draft') || old('status') == 'draft' ? 'selected' : '' }}>Simpan sebagai Draft</option>
                                <option value="published" {{ (isset($berita) && $berita->status == 'published') || old('status') == 'published' ? 'selected' : '' }}>Langsung Terbitkan</option>
                            </select>
                        </div>

                        <div class="form-actions">
                            <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan Berita
                            </button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>

        @push('scripts')
        {{-- Script untuk upload gambar di Trix Editor --}}
        <script>
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
                        // Beritahu Trix URL gambar yang sudah diupload
                        // Ini akan otomatis mengganti preview 'filename + size' dengan gambar asli
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
    @endpush
</body>
</html>