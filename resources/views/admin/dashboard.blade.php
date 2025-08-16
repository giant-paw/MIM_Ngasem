<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

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
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--body-bg);
            color: var(--text-color);
        }
        
        a { text-decoration: none; }
        ul { list-style: none; }

        /* --- ADMIN LAYOUT --- */
        .admin-layout {
            display: flex;
        }

        /* --- SIDEBAR --- */
        .sidebar {
            width: 260px;
            background-color: var(--sidebar-bg);
            color: var(--text-light);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: width 0.3s ease;
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

        .sidebar-footer {
            padding: 1.5rem;
        }

        .btn-logout {
            width: 100%;
            padding: 12px;
            background-color: var(--secondary-color);
            color: var(--card-bg);
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            transition: background-color 0.2s ease;
        }
        .btn-logout:hover {
            background-color: #374151;
        }

        /* --- CONTENT WRAPPER --- */
        .content-wrapper {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }
        
        /* --- MAIN HEADER --- */
        .main-header {
            background-color: var(--card-bg);
            padding: 1rem 2.5rem;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .main-header h1 {
            font-size: 1.75rem;
            font-weight: 600;
            color: var(--secondary-color);
        }
        .main-header .welcome-text {
            font-size: 1rem;
            font-weight: 500;
        }

        /* --- MAIN CONTENT --- */
        .main-content {
            padding: 2.5rem;
            flex-grow: 1;
        }
        
        /* --- STATS CARDS GRID (MODIFIED) --- */
        .stats-grid {
            display: grid;
            /* Lebar minimum kartu diperbesar menjadi 300px */
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); 
            gap: 2rem; /* Jarak antar kartu diperbesar */
        }

        /* --- STAT CARD (MODIFIED) --- */
        .stat-card {
            background-color: var(--card-bg);
            padding: 2rem; /* Padding diperbesar */
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }
        
        .stat-card .icon-wrapper {
            width: 70px; /* Ukuran ikon diperbesar */
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem; /* Ukuran ikon di dalamnya diperbesar */
        }
        .stat-card .icon-wrapper.bg-blue { background-color: #dbeafe; color: #2563eb; }
        .stat-card .icon-wrapper.bg-green { background-color: #d1fae5; color: #059669; }

        .stat-card .info h3 {
            font-size: 1rem; /* Ukuran judul diperbesar */
            font-weight: 600;
            color: #6b7280;
            text-transform: uppercase;
            margin-bottom: 0.5rem;
        }

        .stat-card .info .count {
            font-size: 2.5rem; /* Ukuran angka diperbesar */
            font-weight: 700;
            color: var(--secondary-color);
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
                <li><a href="{{ route('admin.dashboard') }}" class="active"><i class="fas fa-tachometer-alt icon"></i> Dashboard</a></li>
                <li><a href="{{ route('admin.guru.index') }}"><i class="fas fa-chalkboard-teacher icon"></i> Kelola Guru</a></li>
                <li><a href="{{ route('admin.berita.index') }}"><i class="fas fa-newspaper icon"></i> Kelola Berita</a></li>
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
                <div>
                    <h1>Dashboard</h1>
                    <p class="welcome-text">Selamat datang kembali, {{ Auth::user()->name }}!</p>
                </div>
            </header>
            
            <main class="main-content">
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="icon-wrapper bg-blue">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <div class="info">
                            <h3>Jumlah Guru</h3>
                            <p class="count">{{ $jumlahGuru }}</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="icon-wrapper bg-green">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        <div class="info">
                            <h3>Jumlah Berita</h3>
                            <p class="count">{{ $jumlahBerita }}</p>
                        </div>
                    </div>
                    </div>
            </main>
        </div>
    </div>
</body>
</html>