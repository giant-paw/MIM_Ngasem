<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - Yayasan Pendidikan Modern</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        /* --- Variabel Global & Reset Dasar --- */
        :root {
            --primary-color: #0d47a1;
            /* Biru Tua */
            --secondary-color: #1976d2;
            /* Biru Terang */
            --light-color: #ffffff;
            --dark-color: #333333;
            --font-family: 'Poppins', sans-serif;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-family);
            line-height: 1.6;
            color: var(--dark-color);
            background-color: #f9f9f9;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        ul {
            list-style: none;
        }

        img {
            max-width: 100%;
            display: block;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        main {
            padding-top: 80px;
            /* Memberi ruang untuk header fixed */
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .divider {
            width: 80px;
            height: 4px;
            background-color: var(--secondary-color);
            margin: 0 auto 3rem;
            border-radius: 2px;
        }

        /* --- Header & Navigation Bar --- */
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

        .logo img {
            height: 45px;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

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

        .nav-links a:hover,
        .nav-links a.active {
            color: var(--secondary-color);
        }

        .nav-links a:hover::after,
        .nav-links a.active::after {
            transform: scaleX(1);
        }
        
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

        .login-button {
            background-color: var(--primary-color);
            color: var(--light-color);
            padding: 0.5rem 1.5rem;
            border-radius: 20px;
            font-weight: 600;
            transition: background-color 0.3s ease;
            margin-left: 1rem;
        }

        .login-button:hover {
            background-color: var(--secondary-color);
        }

        .hamburger {
            display: none;
            font-size: 1.5rem;
            background: none;
            border: none;
            cursor: pointer;
            color: var(--primary-color);
        }

        /* --- Style Halaman "About Us" --- */
        .about-header {
            padding-top: 120px;
            padding-bottom: 4rem;
            background-color: var(--light-color);
            text-align: center;
        }

        .about-section {
            padding: 4rem 0;
        }

        .about-section p {
            max-width: 800px;
            margin: 0 auto 1.5rem auto;
            text-align: justify;
            color: #eee;
            /* Mengubah warna teks agar terlihat di latar belakang biru */
        }

        .vision-mission {
            display: flex;
            gap: 2rem;
            margin-top: 2rem;
            flex-wrap: wrap;
        }

        .vision-mission .card {
            flex: 1;
            background-color: var(--light-color);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.07);
            min-width: 280px;
        }

        .vision-mission .card h3 {
            color: var(--primary-color);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .vision-mission .card p, .vision-mission .card ul {
            color: var(--dark-color);
        }

        .facilities-section {
            padding: 4rem 0;
            background-color: #e9ecef;
        }

        .facilities-image {
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-top: 2rem;
        }

        .facilities-image img {
            width: 100%;
            display: block;
        }

        /* --- FOOTER --- */
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

        /* --- Media Queries untuk Responsif --- */
        @media (max-width: 768px) {
            nav {
                padding: 0.8rem 1.5rem;
            }

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

            .nav-links.active {
                right: 0;
            }

            .nav-links a {
                font-size: 1.2rem;
            }

            .login-button {
                display: none;
            }

            .hamburger {
                display: block;
                z-index: 1001;
            }

            .section-title {
                font-size: 2rem;
            }

            /* Penyesuaian Footer untuk Mobile */
            .footer-content {
                flex-direction: column;
                justify-content: center;
                text-align: center;
                gap: 2.5rem;
            }

            .footer-info {
                flex-direction: column;
                gap: 0.8rem;
            }

            .footer-school-name {
                font-size: 1.2rem;
            }

            .social-links {
                justify-content: center;
            }
            
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
            <a href="/" class="logo">
                <img src="{{ asset('images/logomim.png') }}" alt="Logo MIM Ngasem">
            </a>
            
            <ul class="nav-links">
                <li><a href="{{ route('home') }}">Home</a></li>
                
                <li><a href="{{ route('portal.index') }}">Portal Berita</a></li>
                
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
                
                <li><a href="{{ route('dataguru.index') }}">Data Guru</a></li>
                
                <li><a href="{{ route('about.index') }}">About Us</a></li>
            </ul>

            <a href="{{ route('login') }}" class="login-button">Login Admin</a>
            <button class="hamburger" aria-label="Toggle Menu"><i class="fas fa-bars"></i></button>
        </nav>
    </header>

    <main>
        <section class="about-header">
            <div class="container">
                <h1 class="section-title">Tentang Kami</h1>
                <div class="divider"></div>
                <p style="text-align: center; max-width: 700px; margin: 0 auto;">Mengenal lebih dekat MI Muhammadiyah Ngasem Selatan, lembaga pendidikan yang berdedikasi untuk mencetak generasi unggul berkarakter Islami.</p>
            </div>
        </section>

        <section class="about-section" style="background-color: var(--primary-color);">
            <div class="container">
                <h2 style="text-align:center; color: var(--light-color); margin-bottom: 2rem;">Sejarah Singkat</h2>
                <p>
                    Berdiri sejak tahun XXXX, MI Muhammadiyah Ngasem Selatan merupakan bagian dari amal usaha Muhammadiyah di bidang pendidikan. Didirikan atas semangat untuk memberikan pendidikan dasar yang berkualitas dengan landasan nilai-nilai Islam yang kuat. Sejak awal, kami berkomitmen untuk menjadi madrasah yang tidak hanya unggul dalam bidang akademik, tetapi juga dalam pembentukan akhlak mulia, kemandirian, dan jiwa kepemimpinan siswa.
                </p>
                <p>
                    Dengan dukungan dari masyarakat dan persyarikatan, madrasah kami terus berkembang, menambah fasilitas, dan meningkatkan kualitas tenaga pengajar demi memberikan pelayanan pendidikan terbaik bagi putra-putri di lingkungan Ngasem dan sekitarnya.
                </p>
            </div>
        </section>

        <section class="facilities-section">
            <div class="container">
                <h2 style="text-align:center; color: var(--primary-color); margin-bottom: 2rem;">Fasilitas Kami</h2>
                <p style="text-align: center; color: #555;">Kami menyediakan fasilitas yang mendukung kegiatan belajar mengajar dan pengembangan diri siswa.</p>
                <div class="facilities-image">
                    <img src="{{ asset('images/sekolah.jpeg') }}" alt="Gedung Sekolah MI Muhammadiyah Ngasem Selatan">
                </div>
                <p style="margin-top: 1.5rem; text-align: center; color: #555;">Gedung sekolah yang representatif dengan fasilitas olahraga dan ruang kelas yang nyaman.</p>
            </div>
        </section>

        <section class="about-section" style="background-color: var(--light-color);">
            <div class="container">
                <h2 style="text-align:center; color: var(--primary-color); margin-bottom: 2rem;">Visi & Misi</h2>
                <div class="vision-mission">
                    <div class="card">
                        <h3><i class="fas fa-eye"></i> Visi Kami</h3>
                        <p>"Terwujudnya generasi Muslim yang unggul dalam prestasi, berakhlak mulia, kreatif, dan mandiri berlandaskan iman dan taqwa."</p>
                    </div>
                    <div class="card">
                        <h3><i class="fas fa-rocket"></i> Misi Kami</h3>
                        <ul>
                            <li>- Menyelenggarakan pendidikan yang mengintegrasikan ilmu pengetahuan dan teknologi dengan nilai-nilai keislaman.</li>
                            <li>- Mengembangkan potensi akademik dan non-akademik siswa secara optimal.</li>
                            <li>- Membina akhlak dan kepribadian Islami dalam setiap kegiatan.</li>
                            <li>- Menciptakan lingkungan belajar yang kondusif, inovatif, dan menyenangkan.</li>
                        </ul>
                    </div>
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

    <a href="https://wa.me/6281234567890?text=Halo%20Admin%20MI%20Ngasem%20Selatan,%20saya%20ingin%20bertanya..." 
       class="whatsapp-fab" 
       target="_blank" 
       aria-label="Hubungi Kami via WhatsApp">
        <i class="fab fa-whatsapp"></i>
        <span>Hubungi Kami</span>
    </a>
    
</body>

</html>