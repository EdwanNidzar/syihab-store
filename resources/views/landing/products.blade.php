<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {!! SEO::generate() !!}
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="icon" type="image/png" href="{{ asset('img/logo/new-logo-syihab.png') }}">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

    <!-- Google Analytics -->
    @include('tag.google-analytics')

    @livewireStyles
</head>

<body class="bg-gray-100 text-gray-800">

    <!-- Navigation -->
    <livewire:navigation />

    <!-- Banner -->
    <x-banner-carousel />

    <livewire:product-and-brand />

    <!-- Pilih Smartphone -->
    <livewire:pilih-smartphone />
    
    <!-- Keuntungan Belanja di Syihab Store -->
    <livewire:keuntung-belanja />

    <!-- Tentang Kami -->
    <livewire:about-us />

    <!-- Footer -->
    <livewire:footer />

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    @stack('scripts')

    @livewireScripts
</body>

</html>
