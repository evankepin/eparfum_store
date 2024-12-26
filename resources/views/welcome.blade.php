<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parfum Store</title>
    <!-- Tailwind CSS (optional) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-image: url('{{ asset('images/tokoparfum.jpg') }}');
            background-size: cover;
            background-position: center;
            font-family: 'Arial', sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .floating-parfums {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            padding: 50px 20px;
        }
        .parfum-card {
            background: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            width: 250px;
            text-align: center;
            padding: 20px;
            transition: transform 0.3s ease, background 0.3s ease;
            overflow: hidden;
        }
        .parfum-card:hover {
            transform: translateY(-15px);
            background: rgba(255, 255, 255, 1);
            box-shadow: 0px 12px 24px rgba(0, 0, 0, 0.2);
        }
        .parfum-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 15px;
        }
        .parfum-card h3 {
            font-size: 1.4rem;
            font-weight: bold;
            margin: 10px 0;
            color: #333;
        }
        .buy-button {
            background: #FF7F50;
            color: white;
            padding: 12px 18px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 1rem;
            transition: background 0.3s ease, transform 0.3s ease;
        }
        .buy-button:hover {
            background: #FF5722;
            transform: scale(1.05);
        }
        .overlay {
            background: rgba(0, 0, 0, 0.5);
            padding: 100px 20px;
            border-radius: 10px;
            position: relative;
            margin: 50px auto;
            max-width: 1000px;
            text-align: center;
            color: #fff;
        }
        .overlay h2 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 20px;
        }
        .overlay p {
            font-size: 1.2rem;
            color: #ddd;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header class="bg-transparent p-4 text-white shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-bold">
                Parfum Store
            </h1>
            @if (Route::has('login'))
            <nav class="flex space-x-4">
                @auth
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link text-light" href="{{ route('login') }}">
                                    <i class="fas fa-sign-in-alt"></i> {{ __('Login') }}
                                </a>
                            </li>
                        @endif
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link text-light" href="{{ route('register') }}">
                                    <i class="fas fa-user-plus"></i> {{ __('Register') }}
                                </a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" 
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fas fa-user"></i> {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
                @else
                    <a href="{{ url('login') }}" class="hover:text-gray-400"><i class="fas fa-sign-in-alt"></i> Login</a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="hover:text-gray-400"><i class="fas fa-user-plus"></i> Register</a>
                    @endif
                @endauth
            </nav>
            @endif
        </div>
    </header>

    <!-- Banner Ajak Berbelanja -->
    <section class="overlay">
        <h2 class="text-4xl font-bold mb-4 text-white">Harum yang Memikat, Pesona yang Abadi</h2>
        <p class="text-lg mb-4 text-gray-300">
            Wewangian yang Mencerminkan Kepribadian Anda
        </p>
        <!-- Tombol Belanja Sekarang -->
        <a href="/home" class="buy-button">
            <i class="fas fa-shopping-cart"></i> Mulai Belanja
        </a>
    </section>

    <!-- Floating parfums Section -->
    <section class="floating-parfums">
        <!-- parfum Card Example -->
        <div class="parfum-card">
            <img src="{{ asset('images/logoparfum.jpg') }}" alt="Eau de Parfum">
            <h3>Eau de Parfum</h3>
            <a href="@auth {{ url('/product/3') }} @else {{ route('login') }} @endauth" class="buy-button">
                <i class="fas fa-cart-plus"></i> Buy Now
            </a>
        </div>
        <div class="parfum-card">
            <img src="{{ asset('images/logoparfum.jpg') }}" alt="Eau de Toilette">
            <h3>Eau de Toilette</h3>
            <a href="@auth {{ url('/product/3') }} @else {{ route('login') }} @endauth" class="buy-button">
                <i class="fas fa-cart-plus"></i> Buy Now
            </a>
        </div>
        <div class="parfum-card">
            <img src="{{ asset('images/logoparfum.jpg') }}" alt="Eau de Cologne">
            <h3>Eau de Cologne</h3>
            <a href="@auth {{ url('/product/3') }} @else {{ route('login') }} @endauth" class="buy-button">
                <i class="fas fa-cart-plus"></i> Buy Now
            </a>
        </div>
        <!-- Add more parfum cards as needed -->
    </section>
</body>
</html>
