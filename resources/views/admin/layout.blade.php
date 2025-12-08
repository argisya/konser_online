<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Info Konser Bogor')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        /* CSS Umum untuk Layout */
        .logo img {
            height: 100%;
            object-fit: contain;
        }
    </style>
    @yield('styles') 
</head>
<body>

    <nav class="navbar">
        <div class="logo">
            <img src="{{ asset('img/logo.png') }}" alt="Logo">
        </div>

        <div class="nav-links">
            <a href="{{ route('user.index') }}">Dashboard</a>
            <a href="{{ route('user.konser.index') }}">Data Konser</a>
            <a href="{{ route('user.konser.index') }}">Data Pembayaran</a>
            @if (session('user_id') == true)
            <a href="#">Hi, {{ session('user_name') }}!</a>
            <a href="{{ route('user.login.logout') }}">Logout</a>
            @elseif (session('user_id') == false)
            <a href="{{ route('user.login.index') }}">Login</a>
            @endif
        </div>
    </nav>

    @yield('content')

    <footer class="footer">
        <p>© 2025 mini konser. All Right Reserved.</p>
        <p>Temukan kami di sosial media</p>
        <div class="footer-links">
            <a href="#">Instagram</a>
            <a href="#">Tiktok</a>
            <a href="#">X</a>
        </div>
    </footer>

    @yield('scripts') 

</body>
</html>