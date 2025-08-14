<!DOCTYPE html>
 <html lang="id">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Tentang Kami - Yayasan Pendidikan Modern</title>

     {{-- Menggunakan CSS dan Font yang sama dari halaman utama --}}
     <link rel="stylesheet" href="{{ asset('css/home.css') }}">
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

     <style>
         /* --- Style khusus untuk Halaman "About Us" --- */
         body {
             background-color: #f9f9f9;
         }

         .about-header {
             padding-top: 120px; /* Memberi jarak dari navbar fixed */
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
             color: #555;
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
             box-shadow: 0 4px 15px rgba(0,0,0,0.07);
             min-width: 280px;
         }

         .vision-mission .card h3 {
             color: var(--primary-color);
             margin-bottom: 1rem;
             display: flex;
             align-items: center;
             gap: 0.5rem;
         }

         .team-grid {
             display: grid;
             grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
             gap: 2rem;
             margin-top: 2rem;
         }

         .team-card {
             background: var(--light-color);
             border-radius: 10px;
             box-shadow: 0 4px 15px rgba(0,0,0,0.07);
             text-align: center;
             padding: 2rem 1rem;
             transition: transform 0.3s ease, box-shadow 0.3s ease;
         }

         .team-card:hover {
             transform: translateY(-8px);
             box-shadow: 0 8px 25px rgba(0,0,0,0.12);
         }

         .team-card img {
             width: 120px;
             height: 120px;
             border-radius: 50%;
             margin: 0 auto 1rem;
             object-fit: cover;
             border: 4px solid var(--secondary-color);
         }

         .team-card h4 {
             font-size: 1.2rem;
             color: var(--primary-color);
             margin-bottom: 0.25rem;
         }

         .team-card .role {
             color: #777;
             font-weight: 500;
         }
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

         /* Style untuk section fasilitas */
         .facilities-section {
             padding: 4rem 0;
             background-color: #e9ecef; /* Warna latar belakang sedikit berbeda */
         }

         .facilities-image {
             border-radius: 10px;
             box-shadow: 0 5px 15px rgba(0,0,0,0.1);
             overflow: hidden;
             margin-top: 2rem;
         }

         .facilities-image img {
             width: 100%;
             display: block;
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

     {{-- Kita panggil kembali header/navbar yang sama --}}
     <header>
         <nav>
             <a href="/" class="logo">
                 <img src="{{ asset('images/logomim.png') }}" alt="Logo Perusahaan">
             </a>
             <ul class="nav-links">
                 <li><a href="/">Home</a></li>
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
         <section class="about-header">
             <div class="container">
                 <h1 class="section-title">Tentang Kami</h1>
                 <div class="divider"></div>
                 <p style="text-align: center; max-width: 700px; margin: 0 auto;">Mengenal lebih dekat MI Muhammadiyah Ngasem Selatan, lembaga pendidikan yang berdedikasi untuk mencetak generasi unggul berkarakter Islami.</p>
             </div>
         </section>

         <section class="about-section">
             <div class="container">
                 <h2 style="text-align:center; color: var(--primary-color); margin-bottom: 2rem;">Sejarah Singkat</h2>
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

     {{-- Kita panggil kembali footer yang sama --}}
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
     </script>

 </body>
 </html>