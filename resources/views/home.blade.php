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

/* --- Section Umum --- */
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
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

/* --- Hero Section --- */
.hero {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    color: var(--light-color);
    text-align: center;
    position: relative;
    background: url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=2070&auto=format&fit=crop') no-repeat center center/cover;
}

.hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(45deg, rgba(13, 71, 161, 0.8), rgba(25, 118, 210, 0.7));
    z-index: 1;
}

.hero-content {
    position: relative;
    z-index: 2;
    max-width: 800px;
    padding: 0 2rem;
}

.hero h1 {
    font-size: 3.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
    text-shadow: 2px 2px 8px rgba(0,0,0,0.3);
}

.hero p {
    font-size: 1.25rem;
    margin-bottom: 2rem;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

.cta-button {
    display: inline-block;
    padding: 0.8rem 2.5rem;
    background-color: var(--light-color);
    color: var(--primary-color);
    border-radius: 50px;
    font-weight: 600;
    transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
}

.cta-button:hover {
    background-color: var(--secondary-color);
    color: var(--light-color);
    transform: translateY(-3px);
}

/* --- News Section --- */
.news-section {
    padding: 4rem 0;
    background-color: #f9f9f9;
}

.news-grid {
    display: grid;
    gap: 2rem;
    grid-template-columns: 1fr;
}

.news-card {
    position: relative;
    display: block;
    overflow: hidden;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.news-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
}

.news-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.news-card:hover img {
    transform: scale(1.05);
}

.card-content {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    padding: 2.5rem 1.5rem 1.5rem;
    color: var(--light-color);
    background: linear-gradient(to top, rgba(0, 0, 0, 0.85), transparent);
    z-index: 3;
}

.card-content h3 {
    font-size: 1.3rem;
    line-height: 1.4;
    margin: 0;
}

/* --- Testimonial Section --- */
.testimonial-section {
    padding: 4rem 0;
    background-color: var(--light-color);
    text-align: center;
}

.testimonial-content {
    max-width: 800px;
    margin: 2rem auto 0;
}

.testimonial-content blockquote {
    font-size: 1.25rem;
    font-style: italic;
    line-height: 1.8;
    color: #555;
    border: none;
    margin: 0 0 2rem 0;
    padding: 0;
    position: relative;
}

.testimonial-content blockquote::before {
    content: '“';
    font-family: Georgia, serif;
    font-size: 4rem;
    color: var(--secondary-color);
    position: absolute;
    left: 50%;
    top: -2.5rem;
    transform: translateX(-50%);
}

.testimonial-avatar {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    border: 4px solid var(--light-color);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
    margin: 0 auto 1rem;
}

.testimonial-name {
    font-size: 1.2rem;
    font-weight: 600;
    color: var(--primary-color);
    margin-bottom: 0.25rem;
}

.testimonial-role {
    color: #777;
    font-size: 0.9rem;
}

.testimonial-dots {
    display: flex;
    justify-content: center;
    gap: 0.5rem;
    margin-top: 2rem;
}

.testimonial-dots .dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background-color: #ccc;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.testimonial-dots .dot.active {
    background-color: var(--secondary-color);
}


/* --- Footer --- */
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



/* --- Media Queries untuk Responsif --- */
/* Aturan untuk Tablet */
@media (min-width: 769px) {
    .news-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

/* Aturan untuk Desktop */
@media (min-width: 992px) {
    .news-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

/* Aturan untuk Mobile */
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

    .hero h1 {
        font-size: 2.5rem;
    }

    .hero p {
        font-size: 1rem;
    }

    .section-title {
        font-size: 2rem;
    }
    
    .testimonial-content blockquote {
        font-size: 1.1rem;
    }

    .testimonial-content blockquote::before {
        font-size: 3rem;
        top: -2rem;
    }
}

/* --- About Section (Tambahan) --- */
.about-us-section {
    padding: 5rem 0;
    background-color: var(--light-color);
}

.about-us-grid {
    display: grid;
    grid-template-columns: 1fr 1.2fr; /* Kolom kiri lebih kecil dari kanan */
    gap: 3rem;
    align-items: center;
}

.about-us-image img {
    width: 100%;
    height: auto;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.about-us-content h2 {
    font-size: 2.2rem;
    color: var(--primary-color);
    margin-bottom: 1rem;
    position: relative;
    padding-bottom: 0.5rem;
}

.about-us-content h2::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 60px;
    height: 4px;
    background-color: var(--secondary-color);
    border-radius: 2px;
}

.about-us-content p {
    color: #555;
    margin-bottom: 1.5rem;
    line-height: 1.8;
}

.about-us-stats {
    display: flex;
    gap: 2rem;
    margin-top: 2rem;
    padding-top: 1.5rem;
    border-top: 1px solid #e0e0e0;
}

.stat-item {
    text-align: center;
}

.stat-item .number {
    font-size: 2rem;
    font-weight: 700;
    color: var(--primary-color);
}

.stat-item .label {
    font-size: 0.9rem;
    color: #777;
}

/* Penyesuaian untuk mobile */
@media (max-width: 992px) {
    .about-us-grid {
        grid-template-columns: 1fr; /* Ubah jadi 1 kolom di tablet */
    }
}
    </style>
</head>
<body>

    <header>
        <nav>
            <a href="#" class="logo">
                <img src="{{ asset('images/logomim.png') }}" alt="Logo Perusahaan">
            </a>
            <ul class="nav-links">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('dataguru.index') }}">Data Guru</a></li>
                <li><a href="{{ route('portal.index') }}">Portal Berita</a></li>
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
                <a href="#" class="cta-button">Selengkapnya</a>
            </div>
        </section>
        
        <section id="berita" class="news-section">
            <div class="container">
                <h2 class="section-title">Berita Terkini</h2>
                <div class="divider"></div>
                <div class="news-grid">

                <!-- sesuaikan dengan database -->
                    <a href="#" class="news-card"><img src="https://images.unsplash.com/photo-1579532537598-459ecdaf39cc?q=80&w=1974&auto=format&fit=crop" alt="Gambar Berita"><div class="card-content"><h3>Al Azhar Lahirkan Peneliti...</h3></div></a>
                    <a href="#" class="news-card"><img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?q=80&w=1932&auto=format&fit=crop" alt="Gambar Berita"><div class="card-content"><h3>Sambut Perjuangan Pendidikan...</h3></div></a>
                    <a href="#" class="news-card"><img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?q=80&w=2070&auto=format&fit=crop" alt="Gambar Berita"><div class="card-content"><h3>Haflah Akhirussanah 2025...</h3></div></a>
                    <a href="#" class="news-card"><img src="https://images.unsplash.com/photo-1543269865-cbf427effbad?q=80&w=2070&auto=format&fit=crop" alt="Gambar Berita"><div class="card-content"><h3>Workshop Guru: Metode Inovatif</h3></div></a>
                    <a href="#" class="news-card"><img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=2071&auto=format&fit=crop" alt="Gambar Berita"><div class="card-content"><h3>Kolaborasi Internasional...</h3></div></a>
                    <a href="#" class="news-card"><img src="https://images.unsplash.com/photo-1517048676732-d65bc937f952?q=80&w=2070&auto=format&fit=crop" alt="Gambar Berita"><div class="card-content"><h3>Peringatan Hari Kemerdekaan...</h3></div></a>
                    <a href="#" class="news-card"><img src="https://images.unsplash.com/photo-1588681664899-f142ff2dc9b1?q=80&w=1974&auto=format&fit=crop" alt="Gambar Berita"><div class="card-content"><h3>Gerakan Sekolah Bersih...</h3></div></a>
                    <a href="#" class="news-card"><img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?q=80&w=2070&auto=format&fit=crop" alt="Gambar Berita"><div class="card-content"><h3>Olimpiade Sains Nasional...</h3></div></a>
                    <a href="#" class="news-card"><img src="https://images.unsplash.com/photo-1552664730-d307ca884978?q=80&w=2070&auto=format&fit=crop" alt="Gambar Berita"><div class="card-content"><h3>Pelatihan Kepemimpinan OSIS</h3></div></a>
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
                    <img src="{{ asset('images/pakAgungzoom.JPG') }}" alt="Foto Jihan Fahira" class="testimonial-avatar">
                    <p class="testimonial-name">Agung Nugroho, S.Pd.I</p>
                    <p class="testimonial-role">Kepala Madrasah</p>
                </div>
                <div class="testimonial-dots">
                    <span class="dot active"></span>
                </div>
            </div>
        </section>
        </section>
<section class="about-us-section">
    <div class="container">
        <div class="about-us-grid">
            <div class="about-us-image">
                <img src="{{ asset('images/sekolah.jpeg') }}" alt="Gedung Sekolah MI Muhammadiyah Ngasem Selatan">
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
<section id="berita" class="news-section">
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