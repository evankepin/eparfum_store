@extends('layouts.user')

@section('content')
    <style>
        body {
            background-image: url('{{ asset('assets/images/tokoparfum.jpg') }}');
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
        }
        .floating-parfums {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 50px 20px;
        }
        .parfum-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            width: 200px;
            text-align: center;
            padding: 20px;
            transition: transform 0.3s ease;
        }
        .parfum-card:hover {
            transform: translateY(-10px);
        }
        .parfum-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-bottom: 1px solid #ddd;
            margin-bottom: 10px;
        }
        .parfum-card h3 {
            font-size: 1.1rem;
            margin: 10px 0;
        }
        .buy-button {
            background: #2563eb;
            color: white;
            padding: 8px 12px;
            border-radius: 4px;
            text-decoration: none;
        }
    </style>

    <!-- Header Section -->
    <header class="bg-gray-800 p-4 text-white shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-6">
                <!-- Logo Parfum Store -->
                <h2 class="text-2xl font-bold">
                    <a href="{{ url('/home') }}" class="text-white hover:text-gray-400 flex items-center space-x-2">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="Parfum Store" class="w-8 h-8">
                        <span>Parfum Store</span>
                    </a>
                </h2>
                <!-- Navigasi produk dan cek ongkir -->
                <div class="flex items-center space-x-6">
                    <a href="{{ route('produk.parfum') }}" class="text-white hover:text-gray-400">Produk</a>
                    <a href="{{ url('/cekongkos') }}" class="text-white hover:text-gray-400">Cek Ongkir</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Banner Ajak Berbelanja -->
    <section class="floating-parfums text-center py-5" style="
        color: #fff;
        padding: 80px 20px;
        border-radius: 8px;
        position: relative;
        margin: 40px auto;
        max-width: 1000px;
        overflow: hidden;">
        <div style="background: rgba(0, 0, 0, 0.5); padding: 50px; border-radius: 8px; position: absolute; top: 10%; left: 50%; transform: translateX(-50%);">
            <h1 class="display-4 fw-bold mb-4" style="color: #f8f9fa; font-size: 3rem;">Parfum Store</h1>
        </div>        
    </section>

    <!-- Floating parfums Section -->
    <section class="floating-parfums">
        <!-- parfum Card Example -->
        @foreach (['Eau de Parfum', 'Eau de Toilette', 'Eau de Cologne'] as $parfum)
            <div class="parfum-card">
                <img src="{{ asset('assets/images/logoparfum.jpg') }}" alt="{{ $parfum }}">
                <h3>{{ $parfum }}</h3>
                <a href="#" class="buy-button"><i class="fas fa-cart-plus"></i> Buy Now</a>
            </div>
        @endforeach
    </section>
@endsection
