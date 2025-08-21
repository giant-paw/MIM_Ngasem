<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ekstrakurikuler Tari - MI Ngasem Selatan</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <style>
        :root {
            --primary-color: #0d47a1; 
            --secondary-color: #1976d2;
            --light-color: #ffffff;
            --dark-color: #333333;
            --font-family: 'Poppins', sans-serif;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: var(--font-family); line-height: 1.6; color: var(--dark-color); background-color: #f9f9f9; }
        a { text-decoration: none; color: inherit; }
        ul { list-style: none; }
        img { max-width: 100%; display: block; }
        .container { max-width: 1200px; margin: 0 auto; padding: 0 2rem; }
        main { padding-top: 80px; }

        /* Header & Navigasi */
        header { position: fixed; top: 0; left: 0; width: 100%; background-color: var(--light-color); box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); z-index: 1000; }
        nav { display: flex; justify-content: space-between; align-items: center; max-width: 1200px; margin: 0 auto; padding: 0.8rem 2rem; }
        .logo img { height: 45px; }
        .nav-links { display: flex; gap: 2rem; align-items: center; }
        .nav-links a { font-weight: 600; color: var(--primary-color); padding: 0.5rem 0; position: relative; transition: color 0.3s ease; }
        .nav-links a::after { content: ''; position: absolute; width: 100%; height: 2px; background-color: var(--secondary-color); bottom: 0; left: 0; transform: scaleX(0); transition: transform 0.3s ease-in-out; }
        .nav-links a:hover, .nav-links a.active { color: var(--secondary-color); }
        .nav-links a:hover::after, .nav-links a.active::after { transform: scaleX(1); }
        
        /* Dropdown CSS */
        .dropdown { position: relative; }
        .dropdown-menu { display: none; position: absolute; top: 100%; left: 0; background-color: var(--light-color); border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); min-width: 200px; z-index: 1001; padding: 0.5rem 0; opacity: 0; transform: translateY(10px); transition: opacity 0.3s ease, transform 0.3s ease; }
        .dropdown:hover .dropdown-menu { display: block; opacity: 1; transform: translateY(0); }
        .dropdown-menu a { display: block; padding: 0.7rem 1.2rem; font-weight: 400; }
        .dropdown-menu a::after { display: none; }
        .dropdown-menu a:hover { background-color: #f5f5f5; color: var(--secondary-color); }
        .dropdown > a i { margin-left: 0.3rem; font-size: 0.8em; transition: transform 0.3s ease; }
        .dropdown:hover > a i { transform: rotate(180deg); }
        
        .login-button { background-color: var(--primary-color); color: var(--light-color); padding: 0.5rem 1.5rem; border-radius: 20px; font-weight: 600; transition: background-color 0.3s ease; margin-left: 1rem; }
        .login-button:hover { background-color: var(--secondary-color); }
        .hamburger { display: none; font-size: 1.5rem; background: none; border: none; cursor: pointer; color: var(--primary-color); }
        
        /* Page Header Style */
        .page-header { padding: 4rem 0; background-color: var(--light-color); text-align: center; }
        .section-title { font-size: 2.5rem; color: var(--primary-color); margin-bottom: 0.5rem; }
        .divider { width: 80px; height: 4px; background-color: var(--secondary-color); margin: 0 auto 1.5rem; border-radius: 2px; }
        .page-header p { max-width: 700px; margin: 0 auto; color: #555; }

        /* Intro Section */
        .intro-section { padding: 4rem 0; }
        .intro-grid { display: grid; grid-template-columns: 1.2fr 1fr; gap: 3rem; align-items: center; }
        .intro-image img { border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        .intro-content h2 { font-size: 2rem; color: var(--primary-color); margin-bottom: 1rem; }
        .intro-content p { color: #555; margin-bottom: 1rem; line-height: 1.8; }
        
        /* Gallery Section */
        .gallery-section { padding: 4rem 0; background-color: #eef7ff; }
        .gallery-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; margin-top: 3rem; }
        .gallery-item { border-radius: 15px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        .gallery-item img { width: 100%; height: 250px; object-fit: cover; transition: transform 0.4s ease; }
        .gallery-item:hover img { transform: scale(1.1); }
        
        /* Details Section */
        .details-section { padding: 4rem 0; }
        .details-card { background-color: var(--light-color); padding: 2.5rem; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.07); max-width: 700px; margin: 3rem auto 0; }
        .details-card ul { list-style: none; padding: 0; }
        .details-card li { display: flex; align-items: center; gap: 1rem; font-size: 1.1rem; color: #333; border-bottom: 1px solid #eee; padding: 1rem 0; }
        .details-card li:last-child { border-bottom: none; }
        .details-card .icon { font-size: 1.5rem; color: var(--secondary-color); width: 30px; text-align: center; }
        .details-card strong { color: var(--primary-color); }

        /* Footer */
        footer { background-color: #1a1a1a; color: var(--light-color); padding: 2.5rem 0; }
        .footer-content { display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; flex-wrap: wrap; gap: 1.5rem; }
        .footer-info { display: flex; align-items: center; gap: 1rem; }
        .footer-logo { height: 80px; }
        .footer-school-name { font-size: 1.5rem; font-weight: 600; color: #f0f0f0; }
        .social-links { display: flex; flex-direction: row; align-items: center; gap: 1.2rem; }
        .social-links a { color: #ccc; transition: color 0.3s ease, transform 0.3s ease; }
        .social-links a:hover { color: var(--light-color); transform: translateY(-3px); }
        .social-links i { font-size: 1.6rem; }
        .footer-bottom { text-align: center; border-top: 1px solid #444; padding-top: 1.5rem; font-size: 0.9rem; color: #aaa; }
        
        /* Responsive Media Queries */
        @media (max-width: 992px) {
            .intro-grid { grid-template-columns: 1fr; }
        }
        
        @media (max-width: 768px) {
            nav { padding: 0.8rem 1.5rem; }
            .nav-links { position: fixed; top: 0; right: -100%; height: 100vh; width: 60%; background-color: rgba(255, 255, 255, 0.98); backdrop-filter: blur(5px); flex-direction: column; justify-content: center; align-items: center; gap: 2.5rem; transition: right 0.4s cubic-bezier(0.77, 0, 0.175, 1); }
            .nav-links.active { right: 0; }
            .nav-links a { font-size: 1.2rem; }
            .login-button { display: none; }
            .hamburger { display: block; z-index: 1001; }
            .section-title { font-size: 2rem; }
            .footer-school-name { font-size: 1.2rem; }
            .footer-content { flex-direction: column; justify-content: center; text-align: center; gap: 2.5rem; }
            .footer-info { flex-direction: column; gap: 0.8rem; }
            .social-links { justify-content: center; }
            
            /* Dropdown Mobile CSS */
            .dropdown:hover .dropdown-menu { display: none; }
            .dropdown-menu.show { display: block; opacity: 1; }
            .dropdown-menu { position: static; box-shadow: none; background-color: transparent; padding-left: 1.5rem; width: 100%; text-align: center; transform: none; transition: none; }
            .dropdown-menu a { padding: 0.5rem 1rem; }
        }

                    .whatsapp-fab {
                position: fixed;
                bottom: 30px;
                right: 30px;
                background-color: #25d366;
                color: white;
                border-radius: 35px; /* Membuat sudut menjadi pil */
                display: flex;
                align-items: center;
                padding: 10px 20px;
                text-decoration: none;
                font-family: 'Poppins', sans-serif;
                font-weight: 600;
                font-size: 1rem;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.25);
                z-index: 1000;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .whatsapp-fab:hover {
                transform: translateY(-5px); /* Sedikit terangkat saat disentuh */
                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            }

            .whatsapp-fab i {
                font-size: 2.2rem; /* Ukuran ikon diperbesar */
                margin-right: 10px; /* Jarak antara ikon dan teks */
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
        <section class="page-header">
            <div class="container">
                <h1 class="section-title">Ekstrakurikuler Tari</h1>
                <div class="divider"></div>
                <p>Mewadahi Bakat, Melestarikan Budaya, dan Membangun Kepercayaan Diri Melalui Seni Gerak dan Irama.</p>
            </div>
        </section>

        <section class="intro-section">
            <div class="container">
                <div class="intro-grid">
                    <div class="intro-content">
                        <h2>Ekspresikan Dirimu Melalui Tarian</h2>
                        <p>Ekstrakurikuler Tari di MI Muhammadiyah Ngasem Selatan adalah wadah bagi siswa-siswi yang memiliki minat dan bakat dalam seni tari. Program ini tidak hanya mengajarkan teknik menari, tetapi juga menanamkan rasa cinta terhadap budaya bangsa, khususnya seni tari tradisional.</p>
                        <p>Melalui kegiatan ini, siswa diajak untuk belajar disiplin, bekerja sama dalam tim, serta meningkatkan rasa percaya diri dengan tampil di berbagai acara sekolah maupun di luar sekolah.</p>
                    </div>
                    <div class="intro-image">
                        <img src="{{ asset('images/tari1.jpeg') }}" alt="Siswa-siswi sedang menari tarian tradisional">
                    </div>
                </div>
            </div>
        </section>
        
        <section class="gallery-section">
            <div class="container">
                <h2 class="section-title" style="text-align: center;">Galeri Kegiatan</h2>
                <div class="divider"></div>
                <div class="gallery-grid">
                    <div class="gallery-item">
                        <img src="{{ asset('images/tari2.jpeg') }}" alt="Penampilan tari di panggung">
                    </div>
                    <div class="gallery-item">
                        <img src="{{ asset('images/tari3.jpeg') }}" alt="Latihan tari di dalam ruangan">
                    </div>
                    <div class="gallery-item">
                        <img src="{{ asset('images/tari4.jpeg') }}" alt="Detail kostum penari">
                    </div>
                    <div class="gallery-item">
                        <img src="{{ asset('images/tari5.jpeg') }}" alt="Ekspresi penari cilik">
                    </div>
                </div>
            </div>
        </section>

        <section class="details-section">
            <div class="container">
                <h2 class="section-title" style="text-align: center;">Informasi & Jadwal</h2>
                <div class="details-card">
                    <ul>
                        <li>
                            <span class="icon"><i class="fas fa-calendar-alt"></i></span>
                            <span><strong>Jadwal Latihan:</strong> Setiap hari Selasa, Pukul 12:00 - 14:30 WIB</span>
                        </li>
                        <li>
                            <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                            <span><strong>Lokasi:</strong> Masjid Al-Muhajirin MI Muhammadiyah Ngasem Selatan</span>
                        </li>
                        <li>
                            <span class="icon"><i class="fas fa-user"></i></span>
                            <span><strong>Pembimbing:</strong> Ibu Sri Rahayu, S.Pd.</span>
                        </li>
                    </ul>
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
         const hamburger = document.querySelector('.hamburger');
         const navLinks = document.querySelector('.nav-links');
         hamburger.addEventListener('click', () => {
              navLinks.classList.toggle('active');
         });
         
        const dropdown = document.querySelector('.dropdown > a');
        dropdown.addEventListener('click', (e) => {
            if (window.innerWidth <= 768) {
                e.preventDefault();
                const dropdownMenu = dropdown.nextElementSibling;
                dropdownMenu.classList.toggle('show');
            }
        });
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