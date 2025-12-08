@extends('user.layout')
@section('title', 'Info Konser Bogor')
@section('content')
    <!-- HERO SECTION -->
    <section class="hero">
        <div class="hero-content">
            <h1>TEMUKAN KONSER FAVORITMU DI<br>BOGOR</h1>
            <p>Jangan lewatkan keseruan event musik terbaru di kota hujan!</p>
            <div class="hero-buttons">
                <a href="#konser" class="btn-primary">Lihat Semua Konser</a>
                <a href="#" class="btn-outline">Daftar Akun</a>
            </div>
        </div>
    </section>

    <!-- KONSER SECTION -->
    <section id="konser" class="konser-section">
        <h2>KONSER TERBARU & POPULER</h2>

        <div class="konser-grid">

            <!-- CARD 1 -->
            <div class="card">
                <img src="/img/bogoria_2023.jpg" alt="">
                <div class="card-body">
                    <h3>Sunset di Kebun 2025</h3>
                    <p>Festival musik syahdu di tengah hijau Kebun Raya Bogor.</p>
                    <button class="btn-primary w-100">Lihat Detail</button>
                </div>
            </div>

            <!-- CARD 2 -->
            <div class="card">
                <img src="/img/bogoria_2025.jpg" alt="">
                <div class="card-body">
                    <h3>Soundsfest Xperience Bogor 2025</h3>
                    <p>Ledakan energi musik lintas genre di lifestyle park favoritmu!</p>
                    <button class="btn-primary w-100">Lihat Detail</button>
                </div>
            </div>

            <!-- CARD 3 -->
            <div class="card">
                <img src="/img/mocca_popup_2024.jpg" alt="">
                <div class="card-body">
                    <h3>Bogoria Festival 2025</h3>
                    <p>Gebyar musik awal tahun paling seru di Sentul!</p>
                    <button class="btn-primary w-100">Lihat Detail</button>
                </div>
            </div>

        </div>
    </section>

    <!-- SPOTIFY SECTION -->
    <section class="spotify-section">
        <h2>DENGARKAN MUSIK PILIHAN KAMI!</h2>
        <p>Playlist spesial berisi lagu hits dari musisi yang pernah mengguncang panggung Bogor.</p>

        <div class="spotify-container">
            <iframe style="border-radius:12px"
                src="https://open.spotify.com/embed/playlist/37i9dQZF1DXcBWIGoYBM5M?utm_source=generator"
                width="100%" height="352" frameborder="0"
                allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture">
            </iframe>
        </div>
    </section>
            
@endsection