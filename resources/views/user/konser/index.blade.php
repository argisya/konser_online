@extends('user.layout')
@section('title', 'Semua Konser di Bogor')
@section('content')

    <!-- TITLE SECTION -->
    <section class="concert-title-area">
        <h1>SEMUA KONSER DI BOGOR</h1>
        <p>Temukan jadwal dan detail lengkap konser favoritmu.</p>
    </section>

    <!-- GRID KONSER -->
    <section class="concert-grid-section">

        <div class="concert-grid">

            <!-- CARD TEMPLATE -->
             @foreach ($konser as $konser)
            <div class="concert-card">
                <img src="{{asset ('storage/img-konser/'. $konser->poster )}}" class="card-img" alt="">
                <h3>{{$konser->nama}}</h3>
                <p class="desc">{{$konser->deskripsi}}</p>
                <p class="date">{{$konser->tanggal}}, {{$konser->lokasi}}</p>
                <a href="{{route ('user.konser.detail', $konser->id )}}" class="btn-detail">LIHAT DETAIL</a>
            </div>
            @endforeach

            <!-- <div class="concert-card">
                <img src="/img/bogoria_2025.jpg" class="card-img" alt="">
                <h3>Soundfest Xperience Bogor 2025</h3>
                <p class="desc">Lakukan energi musik tak terbatas hanya di Bogor...</p>
                <p class="date">8 Desember 2025 • Stadion Pakansari</p>
                <a href="#" class="btn-detail">LIHAT DETAIL</a>
            </div>

            <div class="concert-card">
                <img src="/img/mocca_popup_2024.jpg" class="card-img" alt="">
                <h3>Bogoria Festival 2025</h3>
                <p class="desc">Festival musik besar dengan puluhan artis...</p>
                <p class="date">2 Februari 2025 • Sempur</p>
                <a href="#" class="btn-detail">LIHAT DETAIL</a>
            </div> -->

            <!-- TAMBAH CARD LAINNYA SESUAI GAMBAR -->

        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer">
        <p>© 2025 mini konser. All Right Reserved.</p>
        <p>Temukan kami di sosial media</p>
        <div class="footer-links">
            <a href="#">Instagram</a>
            <a href="#">Tiktok</a>
            <a href="#">X</a>
        </div>
    </footer>

@endsection