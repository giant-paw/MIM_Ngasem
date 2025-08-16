<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($user) ? 'Edit Admin' : 'Tambah Admin' }} - Admin Panel</title>

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

        /* --- ADMIN LAYOUT --- */
        .admin-layout { display: flex; }
        .sidebar { width: 260px; background-color: var(--sidebar-bg); color: var(--text-light); min-height: 100vh; display: flex; flex-direction: column; }
        .sidebar-header { padding: 1.5rem; text-align: center; font-size: 1.5rem; font-weight: 700; color: var(--card-bg); border-bottom: 1px solid var(--secondary-color); }
        .sidebar-nav { flex-grow: 1; padding: 1rem; }
        .sidebar-nav a { display: flex; align-items: center; gap: 12px; padding: 12px 15px; border-radius: 8px; color: var(--text-light); margin-bottom: 8px; font-weight: 500; transition: background-color 0.2s ease, color 0.2s ease; }
        .sidebar-nav a .icon { font-size: 1.1rem; width: 20px; text-align: center; }
        .sidebar-nav a:hover, .sidebar-nav a.active { background-color: var(--primary-color); color: var(--card-bg); }
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
        }        .btn-logout:hover { background-color: #374151; }
        .content-wrapper { flex-grow: 1; display: flex; flex-direction: column; }
        .main-header { background-color: var(--card-bg); padding: 1rem 2.5rem; border-bottom: 1px solid var(--border-color); display: flex; justify-content: space-between; align-items: center; }
        .main-header h1 { font-size: 1.75rem; font-weight: 600; color: var(--secondary-color); }
        .main-content { padding: 2.5rem; flex-grow: 1; }
        .card { background-color: var(--card-bg); padding: 2rem; border-radius: 12px; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1); }

        /* --- FORM STYLING --- */
        .form-group { margin-bottom: 1.5rem; }
        .form-group label { display: block; margin-bottom: 0.5rem; font-weight: 600; font-size: 0.875rem; color: var(--secondary-color); }
        .form-control { width: 100%; padding: 12px 15px; border: 1px solid var(--border-color); border-radius: 8px; font-family: 'Poppins', sans-serif; font-size: 1rem; transition: border-color 0.2s ease, box-shadow 0.2s ease; }
        .form-control:focus { outline: none; border-color: var(--primary-color); box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2); }
        .form-error { color: var(--danger-text); font-size: 0.875em; margin-top: 5px; }
        .form-note { font-size: 0.875em; color: #6b7280; margin-top: 5px; }
        .form-actions { display: flex; justify-content: flex-end; gap: 1rem; margin-top: 2rem; padding-top: 1.5rem; border-top: 1px solid var(--border-color); }

        /* --- BUTTONS --- */
        .btn { display: inline-flex; align-items: center; gap: 0.5rem; padding: 10px 20px; border-radius: 8px; font-weight: 600; font-family: 'Poppins', sans-serif; cursor: pointer; border: none; transition: background-color 0.2s ease, transform 0.1s ease; }
        .btn:active { transform: scale(0.98); }
        .btn-primary { background-color: var(--primary-color); color: white; }
        .btn-primary:hover { background-color: var(--primary-hover); }
        .btn-secondary { background-color: var(--border-color); color: var(--secondary-color); }
        .btn-secondary:hover { background-color: #d1d5db; }

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
                <li><a href="{{ route('admin.kategori.index') }}"><i class="fas fa-tags icon"></i> Kelola Kategori</a></li>
                <li><a href="{{ route('admin.users.index') }}" class="active"><i class="fas fa-users-cog icon"></i> Kelola Admin</a></li>
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
                <h1>{{ isset($user) ? 'Edit Data Admin' : 'Tambah Admin Baru' }}</h1>
            </header>
            
            <main class="main-content">
                <div class="card">
                    <form action="{{ isset($user) ? route('admin.users.update', $user->id) : route('admin.users.store') }}" method="POST">
                        @csrf
                        @if(isset($user))
                            @method('PUT')
                        @endif

                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name ?? '') }}" required>
                            @error('name')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email ?? '') }}" required>
                            @error('email')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control" {{ isset($user) ? '' : 'required' }}>
                            @if(isset($user))
                                <p class="form-note">Kosongkan jika tidak ingin mengubah password.</p>
                            @endif
                            @error('password')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Konfirmasi Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" {{ isset($user) ? '' : 'required' }}>
                        </div>
                        
                        <div class="form-actions">
                            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> 
                                {{ isset($user) ? 'Update' : 'Simpan' }}
                            </button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
</body>
</html>