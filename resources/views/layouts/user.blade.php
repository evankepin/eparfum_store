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
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .hamburger-menu {
            display: none;
            flex-direction: column;
            align-items: center;
            background-color: #fff;
            position: absolute;
            top: 60px;
            left: 20px;
            width: 200px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }
        .hamburger-menu a {
            padding: 10px;
            width: 100%;
            text-align: left;
            color: #333;
            text-decoration: none;
            border-bottom: 1px solid #ddd;
        }
        .hamburger-menu a:hover {
            background-color: #f1f1f1;
        }
        .hamburger-menu .user-name {
            padding: 10px;
            font-weight: bold;
        }
        .hamburger {
            display: flex;
            flex-direction: column;
            cursor: pointer;
            background-color: #a9a9a9;
            padding: 10px;
            border-radius: 5px;
        }
        .hamburger span {
            height: 3px;
            width: 25px;
            background: #333;
            margin: 4px 0;
            transition: 0.4s;
        }
        .show {
            display: flex;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const hamburger = document.querySelector('.hamburger');
            const menu = document.querySelector('.hamburger-menu');

            hamburger.addEventListener('click', function () {
                menu.classList.toggle('show');
            });
        });
    </script>
</head>
<body>
    <!-- Header Section -->
    <header class="header bg-white shadow-md p-4 flex justify-between items-center">
        <!-- Left: Hamburger Menu & Logo -->
        <div class="flex items-center space-x-4">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="logo flex items-center space-x-2">
                <img src="/images/logo.jpg" alt="Parfum Store" class="w-16 h-16"> <!-- Replace with your local logo image -->
                <span class="text-lg font-bold">Parfum Store</span>
            </div>
        </div>

        <!-- Right: Navbar & Buy Now Button -->
        <div class="flex items-center space-x-4">
            <nav class="nav hidden md:flex space-x-4">
                <a href="{{ route('produk.parfum') }}" class="text-gray-700 hover:text-blue-600">Produk</a>
                <a href="{{ url('/cekongkos') }}" class="text-gray-700 hover:text-blue-600">Cek Ongkir</a>
            </nav>
            <a href="{{ route('produk.parfum') }}" class="buy-now bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700">
                <i class="fas fa-shopping-cart"></i> Mulai Belanja
            </a>
        </div>

        <!-- Hamburger Menu Content -->
        <div class="hamburger-menu">
            <div class="user-name">{{ Auth::user()->name }}</div>
            <a href="{{ route('profile.edit') }}">Edit Profil</a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </div>
    </header>

    <!-- Products Section -->
    <section class="products flex flex-wrap justify-center gap-6 p-8">
        <!-- Product Card Example -->
        <div class="product-card bg-white rounded-lg shadow-md p-4 w-64 text-center">
            <img src="images/logoparfum.jpg" alt="Eau de Parfum" class="w-full h-48 object-cover mb-4"> <!-- Replace with your local image -->
            <h3 class="text-lg font-semibold">Eau de Parfum</h3>
            <p class="text-gray-600 mb-2">$50.00</p>
            <p class="text-gray-500 text-sm mb-4">A luxurious and lasting fragrance for everyday use.</p>
            <a href="#" class="buy-button bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700">
                <i class="fas fa-cart-plus"></i> Buy Now
            </a>
        </div>

        <!-- Add more product cards as needed -->
    </section>
</body>

</html>
