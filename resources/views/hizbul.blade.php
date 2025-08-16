<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ekstrakurikuler Hizbul Wathan - MI Ngasem Selatan</title>

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
        .intro-grid { display: grid; grid-template-columns: 1fr 1.2fr; gap: 3rem; align-items: center; }
        .intro-image img { border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        .intro-content h2 { font-size: 2rem; color: var(--primary-color); margin-bottom: 1rem; }
        .intro-content p { color: #555; margin-bottom: 1rem; line-height: 1.8; }
        
        /* Highlights Section (for activities/principles) */
        .highlights-section { padding: 4rem 0; background-color: #eef7ff; }
        .highlights-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem; margin-top: 3rem; }
        .highlight-card { background-color: var(--light-color); padding: 2rem; border-radius: 15px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.07); transition: transform 0.3s ease; }
        .highlight-card:hover { transform: translateY(-10px); }
        .highlight-card .icon { font-size: 2.5rem; color: var(--secondary-color); margin-bottom: 1rem; }
        .highlight-card h3 { font-size: 1.2rem; color: var(--primary-color); margin-bottom: 0.5rem; }
        .highlight-card p { font-size: 0.95rem; color: #666; }
        
        /* Gallery Section */
        .gallery-section { padding: 4rem 0; }
        .gallery-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; margin-top: 3rem; }
        .gallery-item { border-radius: 15px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        .gallery-item img { width: 100%; height: 250px; object-fit: cover; transition: transform 0.4s ease; }
        .gallery-item:hover img { transform: scale(1.1); }

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
            .intro-image { order: -1; margin-bottom: 2rem; }
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
        <section class="page-header">
            <div class="container">
                <h1 class="section-title">Ekstrakurikuler Hizbul Wathan</h1>
                <div class="divider"></div>
                <p>Membentuk Kader Tangguh, Berakhlak Mulia, dan Cinta Tanah Air Berlandaskan Nilai-Nilai Islam.</p>
            </div>
        </section>

        <section class="intro-section">
            <div class="container">
                <div class="intro-grid">
                    <div class="intro-content">
                        <h2>Mengenal Pandu HW</h2>
                        <p>Hizbul Wathan (HW) adalah gerakan kepanduan dalam Persyarikatan Muhammadiyah yang berasaskan Islam. Kegiatan ini bertujuan untuk mendidik anak-anak dan pemuda agar menjadi insan Muslim yang sebenar-benarnya dan siap menjadi kader persyarikatan, umat, dan bangsa.</p>
                        <p>Melalui metode kepanduan, siswa diajarkan kemandirian, kedisiplinan, keterampilan bertahan di alam bebas, kepemimpinan, serta semangat tolong-menolong dalam bingkai ajaran Islam.</p>
                    </div>
                    <div class="intro-image">
                        <img src="https://images.unsplash.com/photo-1593721396163-aa21e2e924a4?q=80&w=2070&auto=format&fit=crop" alt="Anggota Hizbul Wathan berbaris">
                    </div>
                </div>
            </div>
        </section>
        
        <section class="highlights-section">
            <div class="container">
                <h2 class="section-title" style="text-align: center;">Fokus Kegiatan Kami</h2>
                <div class="divider"></div>
                <div class="highlights-grid">
                    <div class="highlight-card">
                        <div class="icon"><i class="fas fa-user-shield"></i></div>
                        <h3>Kepemimpinan & Disiplin</h3>
                        <p>Melatih sikap disiplin, tanggung jawab, dan jiwa kepemimpinan melalui latihan baris-berbaris dan upacara.</p>
                    </div>
                    <div class="highlight-card">
                        <div class="icon"><i class="fas fa-campground"></i></div>
                        <h3>Keterampilan Alam</h3>
                        <p>Mempelajari cara berkemah, tali-temali, P3K, dan sandi sebagai bekal kecakapan hidup di alam terbuka.</p>
                    </div>
                    <div class="highlight-card">
                        <div class="icon"><i class="fas fa-hands-helping"></i></div>
                        <h3>Pengabdian Masyarakat</h3>
                        <p>Menumbuhkan kepekaan sosial dan semangat menolong sesama melalui kegiatan bakti sosial dan kemanusiaan.</p>
                    </div>
                    <div class="highlight-card">
                        <div class="icon"><i class="fas fa-quran"></i></div>
                        <h3>Keislaman & Akhlak</h3>
                        <p>Mengintegrasikan nilai-nilai Al-Islam dan Kemuhammadiyahan dalam setiap aktivitas kepanduan.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="gallery-section">
            <div class="container">
                <h2 class="section-title" style="text-align: center;">Galeri Kegiatan HW</h2>
                <div class="divider"></div>
                <div class="gallery-grid">
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1525177398159-8d28b84ebd29?q=80&w=2070&auto=format&fit=crop" alt="Kegiatan berkemah Hizbul Wathan">
                    </div>
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1506748686214-e9df14d4d9d0?q=80&w=1974&auto=format&fit=crop" alt="Menjelajah alam">
                    </div>
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1558023773-698f1a102717?q=80&w=2070&auto=format&fit=crop" alt="Belajar simpul tali">
                    </div>
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1628191081014-a212a4a35f30?q=80&w=2070&auto=format&fit=crop" alt="Api unggun saat berkemah">
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
</body>
</html>