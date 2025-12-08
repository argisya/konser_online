@extends('user.layout')
@section('title', 'Info Konser Bogor')
@section('content')
    <!-- HERO SECTION -->
    <section class="hero">
        <div class="hero-content">
            <h1>TEMUKAN KONSER FAVORITMU DI<br>BOGOR</h1>
            <p>Jangan lewatkan keseruan event musik terbaru di kota hujan!</p>
            <div class="hero-buttons">
                <a href="{{ route('user.konser.index') }}" class="btn-primary">Lihat Semua Konser</a>
                <a href="{{ route('user.login.register') }}" class="btn-outline">Daftar Akun</a>
            </div>
        </div>
    </section>

    <!-- KONSER SECTION -->
    <section id="konser" class="konser-section">
        <h2>KONSER TERBARU & POPULER</h2>

        <div class="konser-grid">

            <!-- CARD 1 -->
            @foreach ($konser as $konser)
            <div class="concert-card">
                <img src="{{asset ('storage/img-konser/'. $konser->poster )}}" class="card-img" alt="">
                <h3>{{$konser->nama}}</h3>
                <p class="desc">{{$konser->deskripsi}}</p>
                <p class="date">{{$konser->tanggal}}, {{$konser->lokasi}}</p>
                <a href="{{route ('user.konser.detail', $konser->id )}}" class="btn-detail">LIHAT DETAIL</a>
            </div>
            @endforeach
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