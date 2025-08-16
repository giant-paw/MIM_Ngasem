<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Kategori - Admin Panel</title>

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
            --success-bg: #d1fae5;
            --success-text: #065f46;
            --danger-bg: #fee2e2;
            --danger-text: #991b1b;
            --warning-bg: #fef3c7;
            --warning-text: #92400e;
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

        /* --- ADMIN LAYOUT --- */
        .admin-layout { display: flex; }

        /* --- SIDEBAR --- */
        .sidebar {
            width: 260px;
            background-color: var(--sidebar-bg);
            color: var(--text-light);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .sidebar-header {
            padding: 1.5rem;
            text-align: center;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--card-bg);
            border-bottom: 1px solid var(--secondary-color);
        }

        .sidebar-nav {
            flex-grow: 1;
            padding: 1rem;
        }

        .sidebar-nav a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 15px;
            border-radius: 8px;
            color: var(--text-light);
            margin-bottom: 8px;
            font-weight: 500;
            transition: background-color 0.2s ease, color 0.2s ease;
        }

        .sidebar-nav a .icon {
            font-size: 1.1rem;
            width: 20px;
            text-align: center;
        }

        .sidebar-nav a:hover, .sidebar-nav a.active {
            background-color: var(--primary-color);
            color: var(--card-bg);
        }

        .sidebar-footer { padding: 1.5rem; }

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
        .btn-logout:hover { background-color: #374151; }

        /* --- CONTENT WRAPPER --- */
        .content-wrapper { flex-grow: 1; display: flex; flex-direction: column; }
        
        /* --- MAIN HEADER --- */
        .main-header {
            background-color: var(--card-bg);
            padding: 1rem 2.5rem;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .main-header h1 { font-size: 1.75rem; font-weight: 600; color: var(--secondary-color); }

        /* --- MAIN CONTENT --- */
        .main-content { padding: 2.5rem; flex-grow: 1; }

        /* --- CARD STYLE --- */
        .card {
            background-color: var(--card-bg);
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
        }

        /* --- TABLE STYLE --- */
        .table-wrapper { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 12px 15px; text-align: left; vertical-align: middle; }
        thead th {
            background-color: #f3f4f6;
            font-weight: 600;
            color: #374151;
            font-size: 0.875rem;
            text-transform: uppercase;
        }
        tbody tr { border-bottom: 1px solid var(--border-color); }
        tbody tr:last-child { border-bottom: none; }
        tbody tr:hover { background-color: #f9fafb; }

        /* --- BUTTONS --- */
        .btn {
            display: inline-block;
            padding: 10px 18px;
            border-radius: 8px;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
            border: none;
            transition: background-color 0.2s ease, transform 0.1s ease;
        }
        .btn:active { transform: scale(0.98); }

        .btn-primary { background-color: var(--primary-color); color: white; }
        .btn-primary:hover { background-color: var(--primary-hover); }
        
        .btn-action {
            padding: 6px 12px;
            font-size: 0.875rem;
            margin-right: 6px;
        }
        
        .btn-edit { background-color: var(--warning-bg); color: var(--warning-text); }
        .btn-edit:hover { background-color: #fde68a; }

        .btn-delete { background-color: var(--danger-bg); color: var(--danger-text); }
        .btn-delete:hover { background-color: #fecaca; }

        /* --- ALERTS --- */
        .alert { padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; font-weight: 500; }
        .alert-success { background-color: var(--success-bg); color: var(--success-text); }
        .alert-danger { background-color: var(--danger-bg); color: var(--danger-text); }
        
        /* --- UTILITIES --- */
        .page-actions { margin-bottom: 1.5rem; display: flex; justify-content: flex-end; }

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
                <li><a href="{{ route('admin.berita.index') }}"><i class="fas fa-newspaper icon"></i> Kelola Berita</a></li>
                <li><a href="{{ route('admin.kategori.index') }}" class="active"><i class="fas fa-tags icon"></i> Kelola Kategori</a></li>
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
                <h1>Kelola Kategori Berita</h1>
            </header>
            
            <main class="main-content">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="card">
                    <div class="page-actions">
                        <a href="{{ route('admin.kategori.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Tambah Kategori
                        </a>
                    </div>
                    
                    <div class="table-wrapper">
                        <table>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Slug</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($kategori as $index => $item)
                                <tr>
                                    <td>{{ $kategori->firstItem() + $index }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->slug }}</td>
                                    <td>
                                        <a href="{{ route('admin.kategori.edit', $item->id) }}" class="btn btn-action btn-edit">Edit</a>
                                        <form action="{{ route('admin.kategori.destroy', $item->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-action btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" style="text-align: center;">Belum ada data kategori.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div style="margin-top: 20px;">
                        {{ $kategori->links() }}
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>