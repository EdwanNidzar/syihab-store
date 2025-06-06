<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="nmXm-gbjM5RazLLF1czd9szRwkpNUohAJDjP2W5t3jU" />
    {!! SEO::generate() !!}
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

    <link rel="icon" type="image/png" href="{{ asset('img/logo/new-logo-syihab.png') }}">

    @stack('styles')

    <!-- Google Analytics -->
    @include('tag.google-analytics')

    @livewireStyles
</head>

<body class="bg-gray-100 text-gray-800">

    <!-- Navigation -->
    <livewire:navigation />

    <!-- Banner -->
    <x-banner-carousel />

    <!-- member card // ini di matikan sampai waktu yg ditentukan-->
    {{-- <livewire:member-card /> --}}

    <!-- Brand dan Variant Harga -->
    <livewire:brand-list />

    <!-- Promo Banner -->
    <livewire:promo-banner />

    <!-- Daily Promo Popup -->
    <livewire:popup-daily-promo />

    <!-- All Products -->
    <livewire:product-list />

    {{-- <!-- Daily Promo -->
    <livewire:components.daily-promo />

    <!-- brand slide -->
    <livewire:slide-brand />

    <!-- Event and Credit -->
    <livewire:event-and-credit /> --}}

    <!-- Keuntungan Belanja di Syihab Store -->
    <livewire:keuntung-belanja />

    <!-- Maps Slider -->
    <livewire:maps-slider />

    <!-- Tentang Kami -->
    <livewire:about-us />

    <!-- Find Our Store -->
    <livewire:find-our-store />

    <!-- Footer -->
    <livewire:footer />


    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    @stack('scripts')
</body>

</html>
