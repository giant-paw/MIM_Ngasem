<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $berita->judul }} - MI Ngasem Selatan</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&family=Merriweather:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        :root {
            --primary-color: #0056b3;
            --text-color: #333;
            --meta-color: #666;
            --bg-color: #f9f9f9;
            --white-color: #ffffff;
            --border-color: #eee;
        }
        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.8;
            margin: 0;
            padding: 0;
            background: var(--bg-color);
            color: var(--text-color);
        }
        /* --- Header --- */
        .site-header {
            background: var(--white-color);
            padding: 10px 5%;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .site-header .logo { font-weight: 700; font-size: 1.5em; text-decoration: none; color: var(--primary-color); }
        .site-header .nav-links a { margin-left: 20px; text-decoration: none; color: var(--text-color); font-weight: 500; }

        /* --- Main Content --- */
        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 40px;
            background: var(--white-color);
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }
        .breadcrumbs { margin-bottom: 20px; font-size: 0.9em; color: var(--meta-color); }
        .breadcrumbs a { color: var(--primary-color); text-decoration: none; }

        .article-header h1 {
            font-family: 'Merriweather', serif;
            font-size: 2.8em;
            line-height: 1.3;
            margin-bottom: 15px;
            color: #1a1a1a;
        }
        .article-meta { color: var(--meta-color); margin-bottom: 30px; font-size: 0.9em; border-top: 1px solid var(--border-color); border-bottom: 1px solid var(--border-color); padding: 10px 0; }
        .article-meta a { color: var(--primary-color); font-weight: 500; text-decoration: none; }

        .featured-image { width: 100%; height: auto; margin-bottom: 30px; border-radius: 8px; }

        .article-content { font-size: 1.1em; }
        .article-content p, .article-content ul, .article-content ol, .article-content blockquote { margin-bottom: 1.5em; }
        .article-content img { max-width: 100%; height: auto; display: block; margin: 30px auto; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        .article-content h2, .article-content h3 { font-family: 'Merriweather', serif; margin-top: 2em; }
        .article-content blockquote { border-left: 3px solid var(--primary-color); padding-left: 20px; font-style: italic; color: #555; }
        .article-content a { color: var(--primary-color); text-decoration: underline; }

        .article-footer { margin-top: 40px; padding-top: 20px; border-top: 1px solid var(--border-color); }
        .social-share a { display: inline-block; margin-right: 10px; padding: 8px 15px; border-radius: 5px; color: var(--white-color); text-decoration: none; font-size: 0.9em; }
        .share-fb { background: #3b5998; }
        .share-tw { background: #1da1f2; }
        .share-wa { background: #25d366; }
        
        .back-link { display: inline-block; margin-top: 30px; text-decoration: none; color: var(--primary-color); }
        
        /* --- Footer --- */
        .site-footer { text-align: center; padding: 20px; margin-top: 40px; background: #343a40; color: #f8f9fa; font-size: 0.9em; }
    </style>
</head>
<body>

    <header class="site-header">
        <a href="/" class="logo">MI Ngasem Selatan</a>
        <nav class="nav-links">
            <a href="/">Home</a>
            <a href="#">Data Guru</a>
            <a href="#">Portal Berita</a>
        </nav>
    </header>

    <div class="container">
        <div class="breadcrumbs">
            <a href="/">Home</a> &raquo; <a href="#">Berita</a> &raquo; <span>{{ Str::limit($berita->judul, 30) }}</span>
        </div>

        <article>
            <div class="article-header">
                <h1>{{ $berita->judul }}</h1>
                <div class="article-meta">
                    <span>Ditulis oleh: <strong>{{ $berita->user->name }}</strong></span> |
                    <span>Kategori: <a href="#">{{ $berita->kategori->nama ?? 'Tidak Berkategori' }}</a></span> |
                    <span>Dipublikasikan pada: {{ $berita->created_at->format('d F Y') }}</span>
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
        
        <a href="/" class="back-link">&larr; Kembali ke Halaman Utama</a>
    </div>

    <footer class="site-footer">
        &copy; {{ date('Y') }} MI Ngasem Selatan. Semua Hak Cipta Dilindungi.
    </footer>

</body>
</html>