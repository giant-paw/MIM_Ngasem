<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $berita->judul }} - MI Ngasem Selatan</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Merriweather:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        /* --- Variabel Global & Reset Dasar --- */
        :root {
            --primary-color: #0d47a1;
            --secondary-color: #1976d2;
            --light-color: #ffffff;
            --dark-color: #333333;
            --meta-color: #666;
            --bg-color: #f9f9f9;
            --border-color: #e0e0e0;
            --font-family: 'Poppins', sans-serif;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: var(--font-family); line-height: 1.8; margin: 0; padding: 0; background: var(--bg-color); color: var(--dark-color); }
        a { text-decoration: none; color: inherit; }
        ul { list-style: none; }
        img { max-width: 100%; display: block; }

        /* --- Header & Navigation Bar --- */
        header { position: fixed; top: 0; left: 0; width: 100%; background-color: var(--light-color); box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); z-index: 1000; }
        nav { display: flex; justify-content: space-between; align-items: center; max-width: 1200px; margin: 0 auto; padding: 0.8rem 2rem; }
        .logo img { height: 45px; }
        .nav-links { display: flex; gap: 2rem; align-items: center; }
        .nav-links a { font-weight: 600; color: var(--primary-color); padding: 0.5rem 0; position: relative; transition: color 0.3s ease; }
        .nav-links a::after { content: ''; position: absolute; width: 100%; height: 2px; background-color: var(--secondary-color); bottom: 0; left: 0; transform: scaleX(0); transform-origin: center; transition: transform 0.3s ease-in-out; }
        .nav-links a:hover, .nav-links a.active { color: var(--secondary-color); }
        .nav-links a:hover::after, .nav-links a.active::after { transform: scaleX(1); }

        /* --- CSS DROPDOWN (DESKTOP) --- */
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

        /* --- Main Content --- */
        main { padding-top: 100px; padding-bottom: 40px; }
        .container { max-width: 800px; margin: 0 auto; padding: 40px; background: var(--light-color); border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.07); }
        .breadcrumbs { margin-bottom: 20px; font-size: 0.9em; color: var(--meta-color); }
        .breadcrumbs a { color: var(--primary-color); font-weight: 500;}
        .breadcrumbs a:hover { text-decoration: underline; }
        .article-header h1 { font-family: 'Merriweather', serif; font-size: 2.5em; line-height: 1.3; margin-bottom: 15px; color: #1a1a1a; }
        .article-meta { color: var(--meta-color); margin-bottom: 30px; font-size: 0.9em; border-top: 1px solid var(--border-color); border-bottom: 1px solid var(--border-color); padding: 10px 0; display: flex; flex-wrap: wrap; gap: 10px; }
        .article-meta span { margin-right: 10px; }
        .article-meta a { color: var(--primary-color); font-weight: 600; }
        .article-meta a:hover { color: var(--secondary-color); }
        .featured-image { width: 100%; height: auto; margin-bottom: 30px; border-radius: 8px; }
        .article-content { font-size: 1.1em; color: var(--dark-color); }
        .article-content p, .article-content ul, .article-content ol, .article-content blockquote { margin-bottom: 1.5em; }
        .article-content img { max-width: 100%; height: auto; display: block; margin: 30px auto; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        .article-content h2, .article-content h3 { font-family: 'Merriweather', serif; margin-top: 2em; color: #1a1a1a;}
        .article-content blockquote { border-left: 4px solid var(--primary-color); padding-left: 20px; font-style: italic; color: #555; background-color: #f7f7f7; padding-top: 10px; padding-bottom: 10px; border-radius: 0 5px 5px 0;}
        .article-content a { color: var(--primary-color); font-weight: 600; border-bottom: 1px dotted var(--primary-color); }
        .article-content a:hover { color: var(--secondary-color); border-bottom-style: solid; }
        .article-footer { margin-top: 40px; padding-top: 20px; border-top: 1px solid var(--border-color); }
        .social-share a { display: inline-block; margin-right: 10px; padding: 8px 15px; border-radius: 25px; color: var(--light-color); font-size: 0.9em; transition: transform 0.2s ease, opacity 0.2s ease;}
        .social-share a:hover { transform: translateY(-3px); opacity: 0.9; }
        .share-fb { background: #3b5998; }
        .share-tw { background: #1da1f2; }
        .share-wa { background: #25d366; }
        .back-link { display: inline-block; margin-top: 30px; color: var(--primary-color); font-weight: 600; }
        .back-link:hover { color: var(--secondary-color); }
        
        /* --- FOOTER --- */
        footer { background-color: #1a1a1a; color: var(--light-color); padding: 2.5rem 0; margin-top: 40px; }
        .footer-container { max-width: 1200px; margin: 0 auto; padding: 0 2rem; }
        .footer-content { display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; flex-wrap: wrap; gap: 1.5rem; }
        .footer-info { display: flex; align-items: center; gap: 1rem; }
        .footer-logo { height: 60px; }
        .footer-school-name { font-size: 1.2rem; font-weight: 600; color: #f0f0f0; }
        .social-links { display: flex; gap: 1.2rem; }
        .social-links a { color: #ccc; transition: color 0.3s ease, transform 0.3s ease; }
        .social-links a:hover { color: var(--light-color); transform: translateY(-3px); }
        .social-links i { font-size: 1.6rem; }
        .footer-bottom { text-align: center; border-top: 1px solid #444; padding-top: 1.5rem; font-size: 0.9rem; color: #aaa; }
        
        /* --- Tombol WhatsApp FAB --- */
        .whatsapp-fab { position: fixed; bottom: 30px; right: 30px; background-color: #25d366; color: white; border-radius: 35px; display: flex; align-items: center; padding: 10px 20px; font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 1rem; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.25); z-index: 1000; transition: transform 0.3s ease, box-shadow 0.3s ease; }
        .whatsapp-fab:hover { transform: translateY(-5px); box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3); }
        .whatsapp-fab i { font-size: 2.2rem; margin-right: 10px; }

        /* --- Aturan untuk Mobile --- */
        @media (max-width: 768px) {
            main { padding-top: 80px; }
            .container { padding: 20px; margin: 0 15px; width: auto; }
            .article-header h1 { font-size: 2em; }
            nav { padding: 0.8rem 1.5rem; }
            .nav-links { position: fixed; top: 0; right: -100%; height: 100vh; width: 70%; max-width: 300px; background-color: rgba(255, 255, 255, 0.98); backdrop-filter: blur(5px); flex-direction: column; justify-content: center; align-items: center; gap: 1.5rem; transition: right 0.4s cubic-bezier(0.77, 0, 0.175, 1); }
            .nav-links.active { right: 0; }
            .nav-links a { font-size: 1.2rem; }
            .login-button { display: none; }
            .hamburger { display: block; z-index: 1001; }
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

            .dropdown > a i { display: none; }
            .dropdown > a { color: var(--primary-color); font-weight: 700; }
            .dropdown-menu { display: block; position: static; background-color: transparent; box-shadow: none; width: 100%; text-align: center; padding: 0; margin-top: 0.5rem; opacity: 1; transform: none; transition: none; }
            .dropdown-menu a { font-size: 1rem; font-weight: 400; color: var(--secondary-color); padding: 0.4rem 1rem; }
            .dropdown-menu a:hover { background-color: transparent; color: var(--primary-color); }
            /* --- END: CSS DROPDOWN MOBILE --- */
        }
    </style>
</head>
<body>

    <header>
        <nav>
            <a href="{{ route('home') }}" class="logo">
                <img src="{{ asset('images/logomim.png') }}" alt="Logo MIM Ngasem">
            </a>
            <ul class="nav-links">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('portal.index') }}" class="active">Portal Berita</a></li>
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
        <div class="container">
            <div class="breadcrumbs">
                <a href="{{ route('home') }}">Home</a> &raquo; <a href="{{ route('portal.index') }}">Berita</a> &raquo; <span>{{ Str::limit($berita->judul, 30) }}</span>
            </div>

            <article>
                <div class="article-header">
                    <h1>{{ $berita->judul }}</h1>
                    <div class="article-meta">
                        <span><i class="fas fa-user-edit"></i> Ditulis oleh: <strong>{{ $berita->user->name }}</strong></span>
                        <span><i class="fas fa-folder-open"></i> Kategori: <a href="#">{{ $berita->kategori->nama ?? 'Tidak Berkategori' }}</a></span>
                        <span><i class="fas fa-calendar-alt"></i> Dipublikasikan pada: {{ $berita->created_at->format('d F Y') }}</span>
                    </div>
                </div>

                @if ($berita->gambar_utama)
                    <img src="{{ Storage::url($berita->gambar_utama) }}" alt="{{ $berita->judul }}" class="featured-image">
                @endif

                <div class="article-content">
                    {!! $berita->konten !!}
                </div>

                <div class="article-footer">
                    <strong>Bagikan Artikel Ini:</strong>
                    <div class="social-share" style="margin-top:10px;">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank" class="share-fb"><i class="fab fa-facebook-f"></i> Facebook</a>
                        <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ urlencode($berita->judul) }}" target="_blank" class="share-tw"><i class="fab fa-twitter"></i> Twitter</a>
                        <a href="https://api.whatsapp.com/send?text={{ urlencode($berita->judul . ' - ' . url()->current()) }}" target="_blank" class="share-wa"><i class="fab fa-whatsapp"></i> WhatsApp</a>
                    </div>
                </div>
            </article>
            
            <a href="{{ route('portal.index') }}" class="back-link">&larr; Kembali ke Portal Berita</a>
        </div>
    </main>

    <footer>
        <div class="footer-container">
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

    <a href="https://wa.me/6281802765855?text=Halo%20Admin%20MI%20Ngasem%20Selatan,%20saya%20ingin%20bertanya..." 
        class="whatsapp-fab" 
        target="_blank" 
        aria-label="Hubungi Kami via WhatsApp">
            <i class="fab fa-whatsapp"></i>
            <span>Hubungi Kami</span>
    </a>

    <script>
        const hamburger = document.querySelector('.hamburger');
        const navLinks = document.querySelector('.nav-links');
        hamburger.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });
    </script>

</body>
</html>