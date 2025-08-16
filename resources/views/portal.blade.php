<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Berita - MI Ngasem Selatan</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <style>
        :root {
            --primary-color: #0d47a1; --secondary-color: #1976d2; --light-color: #ffffff;
            --dark-color: #333333; --font-family: 'Poppins', sans-serif;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: var(--font-family); line-height: 1.6; color: var(--dark-color); background-color: #f9f9f9;}
        a { text-decoration: none; color: inherit; }
        ul { list-style: none; }
        img { max-width: 100%; display: block; }
        .container { max-width: 1200px; margin: 0 auto; padding: 0 2rem; }
        main { padding-top: 80px; }

        /* Header & Navigasi (Sama seperti halaman lain) */
        header { position: fixed; top: 0; left: 0; width: 100%; background-color: var(--light-color); box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); z-index: 1000; }
        nav { display: flex; justify-content: space-between; align-items: center; max-width: 1200px; margin: 0 auto; padding: 0.8rem 2rem; }
        .logo img { height: 45px; }
        .nav-links { display: flex; gap: 2rem; align-items: center; }
        .nav-links a { font-weight: 600; color: var(--primary-color); padding: 0.5rem 0; position: relative; transition: color 0.3s ease; }
        .nav-links a::after { content: ''; position: absolute; width: 100%; height: 2px; background-color: var(--secondary-color); bottom: 0; left: 0; transform: scaleX(0); transition: transform 0.3s ease-in-out; }
        .nav-links a:hover, .nav-links a.active { color: var(--secondary-color); }
        .nav-links a:hover::after, .nav-links a.active::after { transform: scaleX(1); }
        
        /* --- START: CSS BARU UNTUK DROPDOWN --- */
        .dropdown {
            position: relative;
        }

        .dropdown-menu {
            display: none; /* Sembunyikan secara default */
            position: absolute;
            top: 100%;
            left: 0;
            background-color: var(--light-color);
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            min-width: 200px;
            z-index: 1001;
            padding: 0.5rem 0;
            opacity: 0;
            transform: translateY(10px);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .dropdown:hover .dropdown-menu {
            display: block; /* Tampilkan saat hover di desktop */
            opacity: 1;
            transform: translateY(0);
        }

        .dropdown-menu a {
            display: block;
            padding: 0.7rem 1.2rem;
            font-weight: 400; /* Font lebih tipis dari menu utama */
        }
        
        .dropdown-menu a::after {
             display: none; /* Hilangkan garis bawah dari menu utama */
        }

        .dropdown-menu a:hover {
            background-color: #f5f5f5;
            color: var(--secondary-color);
        }
        
        .dropdown > a i {
            margin-left: 0.3rem;
            font-size: 0.8em;
            transition: transform 0.3s ease;
        }
        
        .dropdown:hover > a i {
             transform: rotate(180deg);
        }
        /* --- END: CSS BARU UNTUK DROPDOWN --- */
        
        .login-button { background-color: var(--primary-color); color: var(--light-color); padding: 0.5rem 1.5rem; border-radius: 20px; font-weight: 600; transition: background-color 0.3s ease; margin-left: 1rem; }
        .login-button:hover { background-color: var(--secondary-color); }
        .hamburger { display: none; font-size: 1.5rem; background: none; border: none; cursor: pointer; color: var(--primary-color); }
        
        /* News Section */
        .news-portal-section { padding: 4rem 0; }
        .section-title { text-align: center; font-size: 2.5rem; color: var(--primary-color); margin-bottom: 0.5rem; }
        .divider { width: 80px; height: 4px; background-color: var(--secondary-color); margin: 0 auto 3rem; border-radius: 2px; }
        .news-grid { display: grid; gap: 2rem; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); }
        .news-card { background-color: var(--light-color); border-radius: 15px; overflow: hidden; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08); display: flex; flex-direction: column; transition: transform 0.3s ease, box-shadow 0.3s ease; }
        .news-card:hover { transform: translateY(-8px); box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12); }
        .card-image img { width: 100%; height: 220px; object-fit: cover; }
        .card-content { padding: 1.5rem; flex-grow: 1; display: flex; flex-direction: column; }
        .card-content .category { font-size: 0.8rem; font-weight: 600; color: var(--secondary-color); text-transform: uppercase; margin-bottom: 0.5rem; }
        .card-content h3 { font-size: 1.2rem; margin-bottom: 0.75rem; flex-grow: 1; }
        .card-content .meta { font-size: 0.8rem; color: #666; border-top: 1px solid #eee; padding-top: 1rem; margin-top: auto; }

        /* Pagination */
        .pagination { display: flex; justify-content: center; margin-top: 3rem; }
        .pagination li { margin: 0 5px; }
        .pagination li a, .pagination li span { display: block; padding: 8px 15px; border: 1px solid #ddd; background: white; border-radius: 5px; }
        .pagination li.active span { background-color: var(--primary-color); color: white; border-color: var(--primary-color); }
        .pagination li.disabled span { background-color: #f0f0f0; color: #aaa; }
        
        /* Footer */
        footer {
            background-color: #1a1a1a;
            color: var(--light-color);
            padding: 2.5rem 0;
        }
        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            flex-wrap: wrap;
            gap: 1.5rem;
        }
        .footer-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .footer-logo {
            height: 80px;
        }
        .footer-school-name {
            font-size: 1.5rem;
            font-weight: 600;
            color: #f0f0f0;
        }
        .social-links {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 1.2rem;
        }
        .social-links a {
            color: #ccc;
            transition: color 0.3s ease, transform 0.3s ease;
        }
        .social-links a:hover {
            color: var(--light-color);
            transform: translateY(-3px);
        }
        .social-links i {
            font-size: 1.6rem;
        }
        .footer-bottom {
            text-align: center;
            border-top: 1px solid #444;
            padding-top: 1.5rem;
            font-size: 0.9rem;
            color: #aaa;
        }

        @media (max-width: 768px) {
            nav { padding: 0.8rem 1.5rem; }
            .nav-links { position: fixed; top: 0; right: -100%; height: 100vh; width: 60%; background-color: rgba(255, 255, 255, 0.98); backdrop-filter: blur(5px); flex-direction: column; justify-content: center; align-items: center; gap: 2.5rem; transition: right 0.4s cubic-bezier(0.77, 0, 0.175, 1); }
            .nav-links.active { right: 0; }
            .nav-links a { font-size: 1.2rem; }
            .login-button { display: none; }
            .hamburger { display: block; z-index: 1001; }
            .section-title { font-size: 2rem; }
            .footer-school-name { font-size: 1.2rem; } /* Ukuran font di mobile */
            
            /* Penyesuaian Footer untuk Mobile */
            .footer-content { flex-direction: column; justify-content: center; text-align: center; gap: 2.5rem; }
            .footer-info { flex-direction: column; gap: 0.8rem; }
            .social-links { justify-content: center; }
            
            /* --- START: CSS DROPDOWN UNTUK MOBILE --- */
            .dropdown:hover .dropdown-menu {
                display: none; /* Matikan hover di mobile */
            }

            .dropdown-menu.show {
                display: block; /* Tampilkan dengan class .show dari JS */
                opacity: 1;
            }
            
            .dropdown-menu {
                position: static; /* Hapus positioning absolut */
                box-shadow: none;
                background-color: transparent;
                padding-left: 1.5rem; /* Beri indentasi agar terlihat seperti submenu */
                width: 100%;
                text-align: center;
                transform: none; /* Reset transform */
                transition: none; /* Hapus transisi hover */
            }

            .dropdown-menu a {
                padding: 0.5rem 1rem;
            }
            /* --- END: CSS DROPDOWN UNTUK MOBILE --- */
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <a href="{{ route('home') }}" class="logo">
                <img src="{{ asset('images/logomim.png') }}" alt="Logo MIM">
            </a>
            
            <ul class="nav-links">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('dataguru.index') }}">Data Guru</a></li>
                
                <li class="dropdown">
                    <a href="#">Ekstrakurikuler <i class="fas fa-caret-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('tahfidz.index') }}">Tahfidz</a></li>
                        <li><a href="{{ route('tari.index') }}">Tari</a></li>
                        <li><a href="{{ route('band.index') }}">Drum Band</a></li>
                        <li><a href="{{ route('voli.index') }}">Voli</a></li>
                        <li><a href="{{ route('hizbul.index') }}">Hizbul Wathan</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('portal.index') }}">Portal Berita</a></li>
                <li><a href="{{ route('about.index') }}">About Us</a></li>
            </ul>

            <a href="{{ route('login') }}" class="login-button">Login Admin</a>
            <button class="hamburger" aria-label="Toggle Menu"><i class="fas fa-bars"></i></button>
        </nav>
    </header>

    <main>
        <section class="news-portal-section">
            <div class="container">
                <h2 class="section-title">Portal Berita</h2>
                <div class="divider"></div>
                <div class="news-grid">

                    @forelse ($daftarBerita as $berita)
                        <a href="{{ route('berita.show', $berita->slug) }}" class="news-card">
                            <div class="card-image">
                                @if ($berita->gambar_utama)
                                    <img src="{{ Storage::url($berita->gambar_utama) }}" alt="Gambar {{ $berita->judul }}">
                                @else
                                    <img src="https://placehold.co/400x220/e8e8e8/666?text=Berita" alt="Gambar Berita">
                                @endif
                            </div>
                            <div class="card-content">
                                <span class="category">{{ $berita->kategori->nama ?? 'Umum' }}</span>
                                <h3>{{ $berita->judul }}</h3>
                                <div class="meta">{{ $berita->created_at->format('d F Y') }}</div>
                            </div>
                        </a>
                    @empty
                        <p style="text-align: center; grid-column: 1 / -1;">Saat ini belum ada berita yang diterbitkan.</p>
                    @endforelse

                </div>

                <div class="pagination">
                    {{ $daftarBerita->links() }}
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
                        <a href="https://www.instagram.com/mim.ngasem" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.tiktok.com/@mi_muhammadiyah_ngasem" target="_blank" aria-label="TikTok"><i class="fab fa-tiktok"></i></a>
                        <a href="https://www.facebook.com/mimuhammadiyahngasem" target="_blank" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
                        <a href="mailto:mimuhngasem@gmail.com" aria-label="Email"><i class="fas fa-envelope"></i></a>
                   </div>
              </div>
              <div class="footer-bottom">
                   <p>&copy; 2025 KKN REG UMY 114. All Rights Reserved.</p>
              </div>
         </div>
     </footer>

     <script>
         // Script untuk hamburger menu
         const hamburger = document.querySelector('.hamburger');
         const navLinks = document.querySelector('.nav-links');
         hamburger.addEventListener('click', () => {
              navLinks.classList.toggle('active');
         });
         
        // --- START: JAVASCRIPT BARU UNTUK DROPDOWN MOBILE ---
        const dropdown = document.querySelector('.dropdown > a');

        dropdown.addEventListener('click', (e) => {
            // Cek jika tampilan mobile (hamburger terlihat)
            if (window.innerWidth <= 768) {
                e.preventDefault(); // Mencegah link berpindah halaman
                const dropdownMenu = dropdown.nextElementSibling;
                dropdownMenu.classList.toggle('show');
            }
        });
        // --- END: JAVASCRIPT BARU UNTUK DROPDOWN MOBILE ---
     </script>
</body>
</html>