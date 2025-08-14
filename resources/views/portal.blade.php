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
     </script>
</body>
</html>