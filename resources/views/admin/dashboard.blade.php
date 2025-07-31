<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
</head>
<body>
    <h1>Selamat Datang di Dashboard Admin</h1>
    <p>Hanya admin yang bisa mengakses halaman ini.</p>

    <hr>

    <a href="#">Kelola Guru</a>
    <a href="#">Kelola Berita</a>

    <hr>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>