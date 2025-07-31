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
</head>
<body>

    <header>
        <nav>
            <a href="#" class="logo">
                <img src="https://placehold.co/150x50/ffffff/003366?text=LOGO" alt="Logo Yayasan">
            </a>
            <ul class="nav-links">
                <li><a href="#">Home</a></li>
                <li><a href="#">Data Guru</a></li>
                <li><a href="#berita">Portal Berita</a></li>
                <li><a href="#testimoni">Testimoni</a></li>
                <li><a href="#">About Us</a></li>
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
                <h2 class="section-title">Testimoni</h2>
                <div class="divider"></div>
                <div class="testimonial-content">
                    <blockquote>
                        "Ibu adalah madrasah pertama bagi anaknya, setelah itu adalah lingkungan. Bagi saya pendidikan tidak hanya sebatas akademis, namun akhlak & adab juga harus dimiliki. Untuk itu, memilih sekolah sangatlah penting bagi kami, pilihan menyekolahkan keempat anak kami ke Sekolah Al Azhar yang menurut kami Sekolah Islam terbaik."
                    </blockquote>
                    <img src="https://i.pravatar.cc/100?u=jihan" alt="Foto Jihan Fahira" class="testimonial-avatar">
                    <p class="testimonial-name">Jihan Fahira</p>
                    <p class="testimonial-role">Entrepreneur</p>
                </div>
                <div class="testimonial-dots">
                    <span class="dot active"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>
            </div>
        </section>
    </main>
    
    <footer>
        <div class="container">
            <div class="social-links">
                <a href="https://www.instagram.com/mim.ngasem" target="_blank">
                    <i class="fab fa-instagram"></i> mim.ngasem
                </a>
                <a href="https://www.tiktok.com/@mi_muhammadiyah_ngasem" target="_blank">
                    <i class="fab fa-tiktok"></i> mi_muhammadiyah_ngasem
                </a>
                <a href="https://www.facebook.com/mimuhammadiyahngasem" target="_blank">
                    <i class="fab fa-facebook"></i> mi muhammadiyah ngasem
                </a>
                <a href="mailto:mimuhngasem@gmail.com">
                    <i class="fas fa-envelope"></i> mimuhngasem@gmail.com
                </a>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 Yayasan Pendidikan Modern. All Rights Reserved.</p>
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