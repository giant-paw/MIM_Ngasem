<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - MI Ngasem Selatan</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #0d47a1; /* Biru Tua */
            --secondary-color: #1976d2; /* Biru Terang */
            --light-color: #ffffff;
            --dark-color: #333333;
            --font-family: 'Poppins', sans-serif;
            --error-color: #e74c3c;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: var(--font-family);
            background-color: #f4f7f6;
            display: grid;
            place-items: center;
            min-height: 100vh;
        }

        /* --- Layout Utama --- */
        .login-container {
            display: flex;
            width: 100%;
            max-width: 900px;
            background: var(--light-color);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        /* --- Sisi Kiri (Branding) --- */
        .login-branding {
            flex: 1;
            background: linear-gradient(rgba(13, 71, 161, 0.4), rgba(25, 118, 210, 0.3)), url('{{ asset('images/bg_login.jpg') }}') no-repeat center center/cover;
            color: var(--light-color);
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
        }
        .login-branding h1 {
            font-size: 2rem;
            margin-bottom: 1rem;
            font-weight: 700;
        }
        .login-branding p {
            font-size: 1rem;
            opacity: 0.9;
        }
        .login-branding .logo {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
        }

        /* --- Sisi Kanan (Form) --- */
        .login-form {
            flex: 1;
            padding: 40px;
        }
        .login-form h2 {
            font-size: 1.8rem;
            color: var(--dark-color);
            margin-bottom: 25px;
            font-weight: 600;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #555;
        }
        .form-group input[type="email"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-family: var(--font-family);
            font-size: 1rem;
            transition: border-color 0.3s;
        }
        .form-group input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(13, 71, 161, 0.2);
        }
        .remember-me {
            display: flex;
            align-items: center;
            font-size: 0.9rem;
            color: #555;
        }
        .remember-me input {
            margin-right: 10px;
        }
        .submit-button {
            width: 100%;
            padding: 12px;
            background: var(--primary-color);
            color: var(--light-color);
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .submit-button:hover {
            background: var(--secondary-color);
        }
        .error-message {
            color: var(--error-color);
            font-size: 0.85rem;
            margin-top: 5px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
                max-width: 400px;
                margin: 20px;
            }
            .login-branding {
                display: none; /* Sembunyikan sisi gambar di mobile agar fokus ke form */
            }
        }

        .back-to-home-link {
            position: absolute;
            top: 30px;
            left: 30px;
            display: inline-flex; /* Agar berperilaku seperti tombol */
            align-items: center;
            gap: 8px;
            background-color: var(--light-color); /* Latar belakang putih */
            color: var(--primary-color); /* Teks warna biru utama */
            padding: 10px 20px; /* Padding agar lebih besar */
            border-radius: 50px; /* Sudut sangat tumpul (bentuk pil) */
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); /* Efek bayangan */
            transition: all 0.3s ease;
            z-index: 2;
        }

        .back-to-home-link:hover {
            transform: translateY(-3px); /* Efek terangkat saat disentuh */
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
            color: var(--secondary-color);
        }
    </style>
</head>
<body>
    <a href="{{ route('home') }}" class="back-to-home-link">
        <i class="fas fa-arrow-left"></i>
        <span>Kembali ke Halaman Utama</span>
    </a>

    <div class="login-container">
        <div class="login-branding">
            <img src="{{ asset('images/logomim.png') }}" alt="Logo Sekolah" class="logo">
            <h1>MI Ngasem Selatan</h1>
            <p>Selamat datang di Panel Administrasi Website.</p>
        </div>

        <div class="login-form">
            <h2>Login Panel Admin</h2>
            
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password">
                     @error('password')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group remember-me">
                    <input id="remember_me" type="checkbox" name="remember">
                    <label for="remember_me">Ingat saya</label>
                </div>

                <div class="form-group">
                    <button type="submit" class="submit-button">
                        Log In
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>