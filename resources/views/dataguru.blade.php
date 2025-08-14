<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Guru - Yayasan Pendidikan Modern</title>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <style>
        /* --- CSS BARU YANG SESUAI DENGAN INDEX.HTML MODERN --- */
        :root {
            --primary-color: #0d47a1; /* Biru Tua */
            --secondary-color: #1976d2; /* Biru Terang */
            --light-color: #ffffff;
            --dark-color: #333333;
            --font-family: 'Poppins', sans-serif;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: var(--font-family); line-height: 1.6; color: var(--dark-color); background-color: #f9f9f9;}
        a { text-decoration: none; color: inherit; }
        ul { list-style: none; }
        img { max-width: 100%; display: block; }
        .container { max-width: 1200px; margin: 0 auto; padding: 0 2rem; }
        main { padding-top: 80px; } /* Memberi ruang untuk header fixed */

        /* Header & Navigation Bar */
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: var(--light-color);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0.8rem 2rem;
        }
        .logo img { height: 45px; }
        .nav-links { display: flex; gap: 2rem; align-items: center; }
        .nav-links a {
            font-weight: 600;
            color: var(--primary-color);
            padding: 0.5rem 0;
            position: relative;
            transition: color 0.3s ease;
        }
        .nav-links a::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 2px;
            background-color: var(--secondary-color);
            bottom: 0;
            left: 0;
            transform: scaleX(0);
            transform-origin: center;
            transition: transform 0.3s ease-in-out;
        }
        .nav-links a:hover, .nav-links a.active { color: var(--secondary-color); }
        .nav-links a:hover::after, .nav-links a.active::after { transform: scaleX(1); }
        .login-button {
            background-color: var(--primary-color);
            color: var(--light-color);
            padding: 0.5rem 1.5rem;
            border-radius: 20px;
            font-weight: 600;
            transition: background-color 0.3s ease;
            margin-left: 1rem;
        }
        .login-button:hover { background-color: var(--secondary-color); }
        .hamburger { display: none; font-size: 1.5rem; background: none; border: none; cursor: pointer; color: var(--primary-color); }

        /* Teacher Section */
        .teachers-section { padding: 4rem 0; }
        .section-title { text-align: center; font-size: 2.5rem; color: var(--primary-color); margin-bottom: 0.5rem; }
        .divider { width: 80px; height: 4px; background-color: var(--secondary-color); margin: 0 auto 3rem; border-radius: 2px; }
        .teachers-grid { display: grid; gap: 2rem; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); }
        .teacher-card {
            background-color: var(--light-color);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .teacher-card:hover { transform: translateY(-8px); box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12); }
        .teacher-card img { width: 100%; height: 320px; object-fit: cover; }
        .teacher-info { padding: 1.5rem; }
        .teacher-info h3 { font-size: 1.2rem; margin-bottom: 0.25rem; }
        .teacher-info p { color: #666; }

        /* Footer */
        footer {
    background-color: #1a1a1a; /* Sedikit lebih lembut dari #111 */
    color: var(--light-color);
    padding: 2.5rem 0; /* Sedikit padding vertikal */
}

/* BARU: Kontainer utama untuk layout flex */
.footer-content {
    display: flex;
    justify-content: space-between; /* Mendorong item ke ujung kiri dan kanan */
    align-items: center; /* Menjaga semua item sejajar di tengah secara vertikal */
    margin-bottom: 2rem; /* Jarak ke teks copyright */
    flex-wrap: wrap; /* Agar responsif di layar kecil */
    gap: 1.5rem; /* Jarak jika wrapping terjadi */
}

/* BARU: Grup untuk logo dan nama sekolah */
.footer-info {
    display: flex;
    align-items: center;
    gap: 1rem; /* Jarak antara logo dan teks */
}

/* BARU: Aturan khusus untuk logo di footer */
.footer-logo {
    height: 80px;
}

/* BARU: Aturan untuk nama sekolah */
.footer-school-name {
    font-size: 2rem; /* Ukuran font sedikit lebih besar */
    font-weight: 600;
    color: #f0f0f0;
}

/* MODIFIKASI: Mengubah social-links menjadi baris */
.social-links {
    display: flex;
    flex-direction: row; /* Kunci utama: mengubah dari column ke row */
    align-items: center;
    gap: 1.2rem; /* Jarak antar ikon */
}

.social-links a {
    color: #ccc;
    transition: color 0.3s ease, transform 0.3s ease;
}

.social-links a:hover {
    color: var(--light-color); /* Warna saat hover */
    transform: translateY(-3px); /* Efek sedikit terangkat */
}

.social-links i {
    font-size: 1.6rem; /* Ukuran ikon diperbesar sedikit */
}

.footer-bottom {
    text-align: center;
    border-top: 1px solid #444; /* Garis pemisah yang lebih soft */
    padding-top: 1.5rem;
    font-size: 0.9rem;
    color: #aaa;
}
        /* Media Queries untuk Responsif */
        @media (max-width: 768px) {
            nav { padding: 0.8rem 1.5rem; }
            .nav-links {
                position: fixed;
                top: 0;
                right: -100%;
                height: 100vh;
                width: 60%;
                background-color: rgba(255, 255, 255, 0.98);
                backdrop-filter: blur(5px);
                flex-direction: column;
                justify-content: center;
                align-items: center;
                gap: 2.5rem;
                transition: right 0.4s cubic-bezier(0.77, 0, 0.175, 1);
            }
            .nav-links.active { right: 0; }
            .nav-links a { font-size: 1.2rem; }
            .login-button { display: none; }
            .hamburger { display: block; z-index: 1001; }
            .section-title { font-size: 2rem; }
        }

        .footer-content {
        flex-direction: column;   /* Ubah layout menjadi vertikal */
        justify-content: center;  /* Pusatkan item secara vertikal */
        text-align: center;       /* Buat teks di dalamnya rata tengah */
        gap: 2.5rem;              /* Beri jarak lebih besar antar elemen */
    }
    .footer-info {
        flex-direction: column; /* Buat logo dan nama sekolah juga vertikal */
        gap: 0.8rem;
    }
    .footer-school-name {
        font-size: 1.5rem; /* Perkecil sedikit font nama sekolah di mobile */
    }
    .social-links {
        justify-content: center; /* Pastikan ikon sosmed juga di tengah */
    }
        
    </style>
</head>
<body>

    <header>
        <nav>
            <a href="index.html" class="logo">
                <img src="{{ asset('images/logomim.png') }}" alt="Logo Perusahaan">
            </a>
            <ul class="nav-links">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('dataguru.index') }}" class="active">Data Guru</a></li>
                <li><a href="{{ route('portal.index') }}">Portal Berita</a></li>
                <li><a href="#">About Us</a></li>
            </ul>
            <a href="{{ route('login') }}" class="login-button">Login Admin</a>
            <button class="hamburger" aria-label="Toggle Menu"><i class="fas fa-bars"></i></button>
        </nav>
    </header>

    <main>
        <section class="teachers-section">
            <div class="container">
                <h2 class="section-title">Data Guru</h2>
                
                <div class="divider"></div>
                
                <div class="teachers-grid">
                    @forelse ($daftarGuru as $guru)
                        <div class="teacher-card">
                            {{-- Tampilkan foto jika ada, jika tidak, tampilkan placeholder --}}
                            @if ($guru->foto)
                                <img src="{{ Storage::url($guru->foto) }}" alt="Foto {{ $guru->nama_lengkap }}">
                            @else
                                {{-- Anda bisa gunakan placeholder jika tidak ada foto --}}
                                <img src="https://placehold.co/280x320/e8e8e8/666?text=Foto" alt="Foto tidak tersedia">
                            @endif
                            
                            <div class="teacher-info">
                                <h3>{{ $guru->nama_lengkap }}</h3>
                                <p>{{ $guru->jabatan }}</p>
                            </div>
                        </div>
                    @empty
                        {{-- Pesan ini akan muncul jika tabel guru di database kosong --}}
                        <p style="text-align: center; grid-column: 1 / -1;">Saat ini belum ada data guru yang tersedia.</p>
                    @endforelse
                    
                </div>
            </div>
        </section>
    </main>

    <footer>
    <div class="container">
        <div class="footer-content">
            
            <div class="footer-info">
                <img src="{{ asset('images/logomim.png') }}" alt="Logo MIM Ngasem" class="footer-logo">
                <p class="footer-school-name">MI Muhammadiyah Ngasem Selatan</p>
            </div>

            <div class="social-links">
                <a href="https://www.instagram.com/mim.ngasem" target="_blank" aria-label="Instagram">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://www.tiktok.com/@mi_muhammadiyah_ngasem" target="_blank" aria-label="TikTok">
                    <i class="fab fa-tiktok"></i>
                </a>
                <a href="https://www.facebook.com/mimuhammadiyahngasem" target="_blank" aria-label="Facebook">
                    <i class="fab fa-facebook"></i>
                </a>
                <a href="mailto:mimuhngasem@gmail.com" aria-label="Email">
                    <i class="fas fa-envelope"></i>
                </a>
            </div>

        </div>

        <div class="footer-bottom">
            <p>&copy; 2025 KKN REG UMY 114. All Rights Reserved.</p>
        </div>
    </div>
    </footer>
    
    <script>
        const hamburger = document.querySelector('.hamburger');
        const navLinks = document.querySelector('.nav-links');

        hamburger.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });
    </script>

</body>
</html>