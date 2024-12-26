<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Parfum Store</title>
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
        }
        .sidebar {
            position: fixed;
            top: 0;
            left: -250px;
            width: 250px;
            height: 100%;
            background: #343a40;
            color: #fff;
            transition: all 0.3s;
            z-index: 1000;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
        }
        .sidebar.active {
            left: 0;
        }
        .sidebar .nav-item a {
            color: #fff;
        }
        .sidebar .nav-item a:hover {
            background: #495057;
        }
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            z-index: 999;
        }
        .overlay.active {
            display: block;
        }
        .main-content {
            transition: margin-left 0.3s;
        }
        .main-content.shifted {
            margin-left: 250px;
        }
    </style>
</head>
<body>
    <div id="app">
        <main>
            @auth
            <!-- Sidebar khusus admin -->
            @if(auth()->user()->role == 'admin')
            <div class="overlay" id="overlay" onclick="toggleSidebar()"></div>
            <div class="sidebar" id="sidebar">
                <div class="p-3">
                    <h5 class="text-white">Menu</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="{{ url('admin') }}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('datauser') }}" class="nav-link {{ request()->is('datauser') ? 'active' : '' }}">Data User</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/dataproduk') }}" class="nav-link {{ request()->is('dataproduk') ? 'active' : '' }}">Data Produk</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/datapesanan') }}" class="nav-link {{ request()->is('datapesanan*') ? 'active' : '' }}">Data Pesanan</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/cekongkir') }}" class="nav-link {{ request()->is('cekongkir*') ? 'active' : '' }}">Ongkir</a>
                        </li>
                    </ul>
                </div>
            </div>
            @endif
            @endauth

            <!-- Navbar -->
            <nav class="navbar navbar-light bg-light shadow-sm">
                <div class="container-fluid">
                    @auth
                    @if(auth()->user()->role == 'admin')
                        <button class="btn btn-outline-primary" onclick="toggleSidebar()">&#9776;</button>
                    @endif
                    @endauth
                    <a class="navbar-brand ms-3" href="{{ url('/') }}">Parfum Store</a>
                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>

            <!-- Konten Utama -->
            <div class="main-content" id="mainContent">
                <div class="container mt-4">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            const mainContent = document.getElementById('mainContent');

            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
            mainContent.classList.toggle('shifted');
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
