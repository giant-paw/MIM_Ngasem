<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <style>
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

        .stats-cards {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        .card {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card h3 {
            margin-top: 0;
        }

        .card .count {
            font-size: 2.5rem;
            font-weight: bold;
        }

        .logout-form {
            margin-top: 40px;
        }
    </style>
</head>

<body>
    <div class="admin-layout">
        <aside class="sidebar">
            <h2>Admin Panel</h2>
            <ul>
                <li><a href="{{ route('admin.dashboard') }}" class="active">Dashboard</a></li>
                <li><a href="{{ route('admin.guru.index') }}">Kelola Guru</a></li>
                <li><a href="#">Kelola Berita</a></li>
            </ul>
            <form class="logout-form" method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    style="width: 100%; padding: 10px; background-color: #e74c3c; color: white; border: none; border-radius: 5px; cursor: pointer;">Logout</button>
            </form>
        </aside>

        <main class="main-content">
            <h1>Dashboard</h1>
            <p>Selamat datang kembali, {{ Auth::user()->name }}!</p>

            <div class="stats-cards">
                <div class="card">
                    <h3>Jumlah Guru</h3>
                    <p class="count">{{ $jumlahGuru }}</p>
                </div>
                <div class="card">
                    <h3>Jumlah Berita</h3>
                    <p class="count">{{ $jumlahBerita }}</p>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
