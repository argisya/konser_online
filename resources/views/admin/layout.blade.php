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
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a href="{{ route('admin.konser') }}">Data Konser</a>
            <a href="{{ route('admin.transaksi') }}">Data Pembayaran</a>
            @if (session('admin_id') == true)
            <a href="#">Hi, {{ session('admin_name') }}!</a>
            <a href="{{ route('user.login.logout') }}">Logout</a>
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
    @stack('scripts')

    <!-- sweetalert --> 
    <script src="{{ asset('sweetalert/sweetalert2.all.min.js') }}"></script> 
    <!-- sweetalert End --> 
     <!-- konfirmasi success--> 
    @if (session('success')) 
    <script> 
        Swal.fire({ 
            icon: 'success', 
            title: 'Berhasil!', 
            text: "{{ session('success') }}" 
        }); 
    </script> 
    @endif 
    <!-- konfirmasi success End--> 
    <script type="text/javascript"> 
        //Konfirmasi delete 
        $('.show_confirm').click(function(event) { 
            var form = $(this).closest("form"); 
            var konfdelete = $(this).data("konf-delete"); 
            event.preventDefault(); 
            Swal.fire({ 
                title: 'Konfirmasi Hapus Data?', 
                html: "Data yang dihapus <strong>" + konfdelete + "</strong> tidak dapat dikembalikan!", 
                icon: 'warning', 
                showCancelButton: true, 
                confirmButtonColor: '#3085d6', 
                cancelButtonColor: '#d33', 
                confirmButtonText: 'Ya, dihapus', 
                cancelButtonText: 'Batal' 
            }).then((result) => { 
                if (result.isConfirmed) { 
                    Swal.fire('Terhapus!', 'Data berhasil dihapus.', 'success') 
                        .then(() => { 
                            form.submit(); 
                        }); 
                }
                }); 
            }); 
    </script>

</body>
</html>