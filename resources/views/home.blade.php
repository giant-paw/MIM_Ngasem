<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yayasan Pendidikan Modern</title>
    
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        /* --- Reset & Variabel Global --- */
    :root {
        --primary-color: #0d47a1; /* Biru Tua */
        --secondary-color: #1976d2; /* Biru Terang */
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

    .nav-links a:hover {
        color: var(--secondary-color);
    }

    .nav-links a:hover::after {
        transform: scaleX(1);
    }

    /* --- CSS DROPDOWN (DESKTOP) --- */
    .dropdown {
        position: relative;
    }

    .dropdown-menu {
        display: none;
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
        display: block;
        opacity: 1;
        transform: translateY(0);
    }

    .dropdown-menu a {
        display: block;
        padding: 0.7rem 1.2rem;
        font-weight: 400;
    }

    .dropdown-menu a::after {
        display: none;
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
    /* --- END CSS DROPDOWN (DESKTOP) --- */

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
        color: var(--light-color);
    }

    .hamburger {
        display: none;
        font-size: 1.5rem;
        background: none;
        border: none;
        cursor: pointer;
        color: var(--primary-color);
    }

    /* --- Section Umum & Lainnya --- */
    .container { max-width: 1200px; margin: 0 auto; padding: 0 2rem; }
    .section-title { text-align: center; font-size: 2.5rem; color: var(--primary-color); margin-bottom: 0.5rem; }
    .divider { width: 80px; height: 4px; background-color: var(--secondary-color); margin: 0 auto 3rem; border-radius: 2px; }
    .hero { display: flex; align-items: center; justify-content: center; height: 100vh; color: var(--light-color); text-align: center; position: relative; background: url("{{ asset('images/kelas3.jpeg') }}") no-repeat center center/cover; }
    .hero::before { content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.45); backdrop-filter: blur(4px); -webkit-backdrop-filter: blur(4px); z-index: 1; }
    .hero-content { position: relative; z-index: 2; max-width: 800px; padding: 0 2rem; }
    .hero h1 { font-size: 3.5rem; font-weight: 700; margin-bottom: 1rem; text-shadow: 2px 2px 8px rgba(0,0,0,0.3); }
    .hero p { font-size: 1.25rem; margin-bottom: 2rem; max-width: 600px; margin-left: auto; margin-right: auto; }
    .cta-button { display: inline-block; padding: 0.8rem 2.5rem; background-color: var(--light-color); color: var(--primary-color); border-radius: 50px; font-weight: 600; transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease; }
    .cta-button:hover { background-color: var(--secondary-color); color: var(--light-color); transform: translateY(-3px); }
    .news-section { padding: 4rem 0; background-color: #f9f9f9; }
    .news-grid { display: grid; gap: 2rem; grid-template-columns: 1fr; }
    .news-card { position: relative; display: block; overflow: hidden; border-radius: 15px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08); transition: transform 0.3s ease, box-shadow 0.3s ease; }
    .news-card:hover { transform: translateY(-8px); box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12); }
    .news-card img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s ease; }
    .news-card:hover img { transform: scale(1.05); }
    .card-content { position: absolute; bottom: 0; left: 0; width: 100%; padding: 2.5rem 1.5rem 1.5rem; color: var(--light-color); background: linear-gradient(to top, rgba(0, 0, 0, 0.85), transparent); z-index: 3; }
    .card-content h3 { font-size: 1.3rem; line-height: 1.4; margin: 0; }
    .testimonial-section { padding: 4rem 0; background-color: var(--light-color); text-align: center; }
    .testimonial-content { max-width: 800px; margin: 2rem auto 0; }
    .testimonial-content blockquote { font-size: 1.25rem; font-style: italic; line-height: 1.8; color: #555; border: none; margin: 0 0 2rem 0; padding: 0; position: relative; }
    .testimonial-content blockquote::before { content: '“'; font-family: Georgia, serif; font-size: 4rem; color: var(--secondary-color); position: absolute; left: 50%; top: -2.5rem; transform: translateX(-50%); }
    .whatsapp-fab { position: fixed; bottom: 30px; right: 30px; background-color: #25d366; color: white; border-radius: 35px; display: flex; align-items: center; padding: 10px 20px; text-decoration: none; font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 1rem; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.25); z-index: 1000; transition: transform 0.3s ease, box-shadow 0.3s ease; }
    .whatsapp-fab:hover { transform: translateY(-5px); box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3); }
    .whatsapp-fab i { font-size: 2.2rem; margin-right: 10px; }
    .testimonial-avatar { width: 100px; height: 100px; border-radius: 50%; border: 4px solid var(--light-color); box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15); margin: 0 auto 1rem; }
    .testimonial-name { font-size: 1.2rem; font-weight: 600; color: var(--primary-color); margin-bottom: 0.25rem; }
    .testimonial-role { color: #777; font-size: 0.9rem; }
    .testimonial-dots { display: flex; justify-content: center; gap: 0.5rem; margin-top: 2rem; }
    .testimonial-dots .dot { width: 10px; height: 10px; border-radius: 50%; background-color: #ccc; cursor: pointer; transition: background-color 0.3s ease; }
    .testimonial-dots .dot.active { background-color: var(--secondary-color); }
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
    .about-us-section { padding: 5rem 0; background-color: var(--light-color); }
    .about-us-grid { display: grid; grid-template-columns: 1fr 1.2fr; gap: 3rem; align-items: center; }
    .about-us-image img { width: 100%; height: auto; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
    .about-us-content h2 { font-size: 2.2rem; color: var(--primary-color); margin-bottom: 1rem; position: relative; padding-bottom: 0.5rem; }
    .about-us-content h2::after { content: ''; position: absolute; bottom: 0; left: 0; width: 60px; height: 4px; background-color: var(--secondary-color); border-radius: 2px; }
    .about-us-content p { color: #555; margin-bottom: 1.5rem; line-height: 1.8; }
    .about-us-stats { display: flex; gap: 2rem; margin-top: 2rem; padding-top: 1.5rem; border-top: 1px solid #e0e0e0; }
    .stat-item { text-align: center; }
    .stat-item .number { font-size: 2rem; font-weight: 700; color: var(--primary-color); }
    .stat-item .label { font-size: 0.9rem; color: #777; }

    /* --- Media Queries untuk Responsif --- */
    @media (min-width: 769px) { .news-grid { grid-template-columns: repeat(2, 1fr); } }
    @media (min-width: 992px) { .news-grid { grid-template-columns: repeat(3, 1fr); } }
    @media (max-width: 992px) { .about-us-grid { grid-template-columns: 1fr; } }

    /* Aturan untuk Mobile */
    @media (max-width: 768px) {
        nav { padding: 0.8rem 1.5rem; }
        .nav-links { position: fixed; top: 0; right: -100%; height: 100vh; width: 70%; max-width: 300px; background-color: rgba(255, 255, 255, 0.98); backdrop-filter: blur(5px); flex-direction: column; justify-content: center; align-items: center; gap: 1.5rem; transition: right 0.4s cubic-bezier(0.77, 0, 0.175, 1); }
        .nav-links.active { right: 0; }
        .nav-links a { font-size: 1.2rem; }
        .login-button { display: none; }
        .hamburger { display: block; z-index: 1001; }
        .hero h1 { font-size: 2.5rem; }
        .hero p { font-size: 1rem; }
        .section-title { font-size: 2rem; }
        .testimonial-content blockquote { font-size: 1.1rem; }
        .testimonial-content blockquote::before { font-size: 3rem; top: -2rem; }
        .footer-content { flex-direction: column; justify-content: center; text-align: center; gap: 2.5rem; }
        .footer-info { flex-direction: column; gap: 0.8rem; }
        .footer-school-name { font-size: 1.2rem; }
        .social-links { justify-content: center; }
        
        /* --- START: CSS DROPDOWN MOBILE --- */
        
        /* PERBAIKAN: Menambahkan ini untuk menengahkan teks "Ekstrakurikuler" */
        .dropdown {
            width: 100%;
            text-align: center;
        }

        .dropdown > a i {
            display: none;
        }

        .dropdown > a {
            color: var(--primary-color);
            font-weight: 700;
        }
        
        .dropdown-menu {
            display: block;
            position: static;
            background-color: transparent;
            box-shadow: none;
            width: 100%;
            text-align: center;
            padding: 0;
            margin-top: 0.5rem;
            opacity: 1;
            transform: none;
            transition: none;
        }
        
        .dropdown-menu a {
            font-size: 1rem;
            font-weight: 400;
            color: var(--secondary-color);
            padding: 0.4rem 1rem;
        }

        .dropdown-menu a:hover {
            background-color: transparent;
            color: var(--primary-color);
        }
        /* --- END: CSS DROPDOWN MOBILE --- */
    }
    </style>
</head>
<body>

    <header>
        <nav>
            <a href="{{ route('home') }}" class="logo">
                <img src="{{ asset('images/logomim.png') }}" alt="Logo Perusahaan">
            </a>
            
            <ul class="nav-links">
                <li><a href="{{ route('home') }}" class="active">Home</a></li>
                
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

            <button class="hamburger" aria-label="Toggle Menu">
                <i class="fas fa-bars"></i>
            </button>
        </nav>
    </header>

    <main>
        <section class="hero">
            <div class="hero-content">
                <h1>Membangun Generasi Unggul Berkarakter</h1>
                <p>Komitmen kami untuk memajukan pendidikan, dakwah, dan sosial kemasyarakatan.</p>
                <a href="{{ route('about.index') }}" class="cta-button">Selengkapnya</a>
            </div>
        </section>
        
        <section id="berita" class="news-section">
            <div class="container">
                <h2 class="section-title">Berita Terkini</h2>
                <div class="divider"></div>
                <div class="news-grid">

                    @forelse ($daftarBerita as $berita)
                        <a href="{{ route('berita.show', $berita->slug) }}" class="news-card">
                            @if ($berita->gambar_utama)
                                <img src="{{ Storage::url($berita->gambar_utama) }}" alt="Gambar {{ $berita->judul }}">
                            @else
                                <img src="https://placehold.co/600x400/e8e8e8/666?text=Berita" alt="Gambar Berita">
                            @endif
                            <div class="card-content">
                                <h3>{{ Str::limit($berita->judul, 50) }}</h3>
                            </div>
                        </a>
                    @empty
                        <p style="text-align: center; grid-column: 1 / -1; color: #777;">
                            Belum ada berita terkini yang diterbitkan.
                        </p>
                    @endforelse

                </div>
            </div>
        </section>

        <section id="testimoni" class="testimonial-section">
            <div class="container">
                <h2 class="section-title">Sambutan Kepala Madrasah</h2>
                <div class="divider"></div>
                <div class="testimonial-content">
                    <blockquote>
                        "Ibu adalah madrasah pertama bagi anaknya, setelah itu adalah lingkungan. Bagi saya pendidikan tidak hanya sebatas akademis, namun akhlak & adab juga harus dimiliki. Untuk itu, memilih sekolah sangatlah penting bagi kami, pilihan menyekolahkan keempat anak kami ke MI Muhammadiyah Ngasem Selatan yang menurut kami Sekolah Islam terbaik."
                    </blockquote>
                    <img src="{{ asset('images/pakAgungzoom.JPG') }}" alt="Foto Kepala Madrasah" class="testimonial-avatar">
                    <p class="testimonial-name">Agung Nugroho, S.Pd.I</p>
                    <p class="testimonial-role">Kepala Madrasah</p>
                </div>
                <div class="testimonial-dots">
                    <span class="dot active"></span>
                </div>
            </div>
        </section>

        <section class="about-us-section">
            <div class="container">
                <div class="about-us-grid">
                    <div class="about-us-image">
                        <img src="{{ asset('images/gedung_mi.jpeg') }}" alt="Gedung Sekolah MI Muhammadiyah Ngasem Selatan">
                    </div>
                    <div class="about-us-content">
                        <h2>Cerita Kami</h2>
                        <p>
                            MI Muhammadiyah Ngasem Selatan adalah lembaga pendidikan yang berdedikasi untuk menciptakan lingkungan belajar yang inspiratif dan penuh kasih. Kami percaya bahwa pendidikan berkualitas adalah kunci untuk membuka potensi tak terbatas pada setiap anak.
                        </p>
                        <p>
                            Dengan komitmen kuat, kami berupaya membekali generasi penerus dengan <strong>pendidikan modern dan teknologi</strong> tanpa meninggalkan akar <strong>budaya dan nilai-nilai keislaman</strong>. Kami siap mendampingi setiap siswa dalam perjalanan mereka menemukan ilmu dan membentuk karakter.
                        </p>
                        <div class="about-us-stats">
                            <div class="stat-item">
                                <span class="number">10+</span>
                                <span class="label">Tenaga Pendidik</span>
                            </div>
                            <div class="stat-item">
                                <span class="number">70+</span>
                                <span class="label">Siswa Aktif</span>
                            </div>
                            <div class="stat-item">
                                <span class="number">6</span>
                                <span class="label">Ruang Kelas</span>
                            </div>
                        </div>
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

    <a href="https://wa.me/6281802765855?text=Halo%20Admin%20MI%20Ngasem%20Selatan,%20saya%20ingin%20mendapatkan%20informasi%20lebih%20lanjut..." 
       class="whatsapp-fab" 
       target="_blank" 
       aria-label="Hubungi Kami via WhatsApp">
        <i class="fab fa-whatsapp"></i>
        <span>Hubungi Kami</span>
    </a>

</body>
</html>