<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Guru - Admin Panel</title>
    <style>
        /* Menggunakan style yang sama dengan dashboard untuk konsistensi */
        body {
            font-family: sans-serif;
            margin: 0;
            background-color: #f4f7f6;
        }

        .admin-layout {
            display: flex;
        }

        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: white;
            min-height: 100vh;
            padding: 20px;
        }

        .sidebar h2 {
            text-align: center;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li a {
            display: block;
            color: white;
            padding: 15px;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .sidebar ul li a:hover,
        .sidebar ul li a.active {
            background-color: #34495e;
        }

        .main-content {
            flex-grow: 1;
            padding: 40px;
        }

        .logout-form {
            margin-top: 40px;
        }

        /* Style khusus untuk halaman ini */
        .table-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .action-buttons a,
        .action-buttons button {
            margin-right: 5px;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 3px;
            color: white;
            border: none;
            cursor: pointer;
        }

        .btn-edit {
            background-color: #f39c12;
        }

        .btn-delete {
            background-color: #e74c3c;
        }

        .btn-add {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 15px;
            background-color: #2ecc71;
            color: white;
            text-decoration: none;
            border-radius: 5px;
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
                <li><a href="{{ route('admin.berita.index') }}">Kelola Berita</a></li>
                <li><a href="{{ route('admin.kategori.index') }}">Kelola Kategori</a></li> 
                <li><a href="{{ route('admin.users.index') }}">Kelola Admin</a></li>   
            </ul>

            <form class="logout-form" method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    style="width: 100%; padding: 10px; background-color: #e74c3c; color: white; border: none; border-radius: 5px; cursor: pointer;">Logout</button>
            </form>
        </aside>

        <main class="main-content">
            <h1>Kelola Data Guru</h1>

            @if (session('success'))
                <div
                    style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-container">
                <a href="{{ route('admin.guru.create') }}" class="btn-add">Tambah Guru Baru</a>

                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama Lengkap</th>
                            <th>Jabatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataGuru as $index => $guru)
                            <tr>
                                <td>{{ $dataGuru->firstItem() + $index }}</td>
                                <td>
                                    @if ($guru->foto)
                                        <!-- <img src="{{ Storage::url($guru->foto) }}" alt="Foto {{ $guru->nama_lengkap }}"
                                            width="80" style="border-radius: 8px;"> -->

                                        <img src="{{ asset('storage/' . str_replace('public/', '', $guru->foto)) }}" alt="Foto {{ $guru->nama_lengkap }}"
                                         width="80" style="border-radius: 8px;">
                                    @else
                                        <span style="color: #999;">Tidak ada foto</span>
                                    @endif
                                </td>
                                <td>{{ $guru->nama_lengkap }}</td>
                                <td>{{ $guru->jabatan }}</td>
                                <td class="action-buttons">
                                    <a href="{{ route('admin.guru.edit', $guru->id) }}" class="btn-edit">Edit</a>
                                    <form action="{{ route('admin.guru.destroy', $guru->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="text-align: center;">Belum ada data guru.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div style="margin-top: 20px;">
                    {{ $dataGuru->links() }}
                </div>
            </div>
        </main>
    </div>
</body>

</html>
