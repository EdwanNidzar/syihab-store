<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syihab Store</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

    @livewireStyles
</head>

<body class="bg-gray-100 text-gray-800">

    <!-- Navigation -->
    <livewire:navigation />

    <!-- Banner -->
    <x-banner-carousel />

    <!-- member card -->
    <livewire:member-card />

    <!-- Promo Banner -->
    <livewire:promo-banner />

    <!-- Daily Promo Popup -->
    <livewire:popup-daily-promo />

    <!-- Daily Promo -->
    <livewire:components.daily-promo />

    <!-- brand slide -->
    <livewire:slide-brand />

    <!-- Event and Credit -->
    <livewire:event-and-credit />

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
    <script>
        document.addEventListener('alpine:init', () => {
            console.log('Alpine dan Livewire ready');
        });
    </script>
    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('product-not-found', (slug) => {
                alert(`Produk ${slug} tidak ditemukan`);
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    @stack('scripts')
</body>

</html>
