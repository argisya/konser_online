<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Bogoria Festival</title>

    <!-- CSS LAYOUT -->
    <link rel="stylesheet" href="/css/layout.css">

    <!-- CSS ADMIN (Dashboard) -->
    <link rel="stylesheet" href="/css/admin.css">
</head>

<body>

    <!-- NAVBAR -->
    <nav class="admin-navbar">
        <div class="logo">Bogoria Festival Admin</div>

        <div class="nav-right">
            <form method="POST" action="{{ route('admin.logout') }}" style="margin: 0;">
                @csrf
                <button class="logout-btn">Logout</button>
            </form>
        </div>
    </nav>

    <!-- MAIN WRAPPER -->
    <div class="admin-wrapper">

        <!-- SIDEBAR -->
        <aside class="sidebar">

            <div class="sidebar-title">Menu</div>

            <ul class="sidebar-menu">
                <li><a href="{{ route('admin.dashboard') }}" class="sidebar-item">Dashboard</a></li>
                <li><a href="{{ route('admin.konser.index') }}" class="sidebar-item">Data Konser</a></li>
                <li><a href="{{ route('admin.dashboard') }}" class="sidebar-item">Transaksi</a></li>
                <li class="sidebar-dropdown">
                    <span class="sidebar-item dropdown-toggle">Paket Tiket</span>
                    <ul class="dropdown-menu">
                     5   @foreach(\App\Models\Concert::all() as $k)
                            <li>
                                <a href="{{ route('admin.paket.index', $k->id) }}" class="sidebar-item-child">
                                    {{ $k->judul }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>

        </aside>

        <style>
            .sidebar-dropdown .dropdown-menu {
                display: none;
                list-style: none;
                padding-left: 15px;
            }
            .sidebar-dropdown.open .dropdown-menu {
                display: block;
            }
            .sidebar-item-child {
                font-size: 14px;
                padding: 5px 0;
                display: block;
            }
            .dropdown-toggle {
                cursor: pointer;
            }
        </style>

        <!-- CONTENT -->
        <main class="content-area">
            @yield('content')
        </main>

    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll(".sidebar-dropdown .dropdown-toggle").forEach(item => {
            item.addEventListener("click", () => {
                item.parentElement.classList.toggle("open");
            });
        });
    });
    </script>
</body>
</html>
