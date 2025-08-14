<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Berita - Admin Panel</title>
    {{-- Menggunakan style yang sama dengan dashboard untuk konsistensi --}}
    <style>
        body { font-family: sans-serif; margin: 0; background-color: #f4f7f6; }

        .admin-layout { display: flex; }

        .sidebar { width: 250px; background-color: #2c3e50; color: white; min-height: 100vh; padding: 20px; }

        .sidebar h2 { text-align: center; }

        .sidebar ul { list-style: none; padding: 0; }

        .sidebar ul li a { display: block; color: white; padding: 15px; text-decoration: none; border-radius: 5px; margin-bottom: 10px; }

        .sidebar ul li a:hover, .sidebar ul li a.active { background-color: #34495e; }

        .main-content { flex-grow: 1; padding: 40px; }

        .table-container { background-color: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }

        table { width: 100%; border-collapse: collapse; }

        th, td { padding: 15px; text-align: left; border-bottom: 1px solid #ddd; }

        th { background-color: #f2f2f2; }

        .action-buttons a, .action-buttons button { margin-right: 5px; padding: 5px 10px; text-decoration: none; border-radius: 3px; color: white; border: none; cursor: pointer;}

        .btn-edit { background-color: #f39c12; }

        .btn-delete { background-color: #e74c3c; }

        .btn-add { display: inline-block; margin-bottom: 20px; padding: 10px 15px; background-color: #2ecc71; color: white; text-decoration: none; border-radius: 5px;}

        .btn-preview { background-color: #3498db; }

        .status-badge {
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 0.8em;
            font-weight: bold;
            color: white;
        }
        .status-published {
            background-color: #2ecc71; /* Hijau */
        }
        .status-draft {
            background-color: #ff0000ff; /* Abu-abu */
        }
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
            <h1>Kelola Data Berita</h1>
            
            @if (session('success'))
                <div style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
                    {{ session('success') }}
                </div>
            @endif
            <div class="table-container">
                <a href="{{ route('admin.berita.create') }}" class="btn-add">Tambah Berita Baru</a>
                
                <!-- <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Berita</th>
                            <th>Penulis</th>
                            <th>Tanggal Publikasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataBerita as $index => $item)
                            <tr>
                                <td>{{ $dataBerita->firstItem() + $index }}</td>
                                <td>{{ $item->judul }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->created_at->format('d M Y') }}</td>
                                
                                
                                <td class="action-buttons">
                                    <a href="{{ route('berita.show', $item->slug) }}" target="_blank" class="btn-preview">Preview</a>
                                    <a href="{{ route('admin.berita.edit', $item->id) }}" class="btn-edit">Edit</a>

                                    <form action="{{ route('admin.berita.destroy', $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">Hapus</button>
                                    </form>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="text-align: center;">Belum ada data berita.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table> -->

                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Berita</th>
                            <th>Penulis</th>
                            <th>Status</th> <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataBerita as $index => $item)
                            <tr>
                                <td>{{ $dataBerita->firstItem() + $index }}</td>
                                <td>{{ Str::limit($item->judul, 40) }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>
                                    @if ($item->status == 'published')
                                        <span class="status-badge status-published">Diterbitkan</span>
                                    @else
                                        <span class="status-badge status-draft">Draft</span>
                                    @endif
                                </td>
                                <td>{{ $item->created_at->format('d M Y') }}</td>
                                <td class="action-buttons">
                                    <a href="{{ route('berita.show', $item->slug) }}" target="_blank" class="btn-preview">Preview</a>
                                    <a href="{{ route('admin.berita.edit', $item->id) }}" class="btn-edit">Edit</a>
                                    <form action="{{ route('admin.berita.destroy', $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" style="text-align: center;">Belum ada data berita.</td> </tr>
                        @endforelse
                    </tbody>
                </table>
                <div style="margin-top: 20px;">
                    {{ $dataBerita->links() }}
                </div>
            </div>
        </main>
    </div>
</body>
</html>