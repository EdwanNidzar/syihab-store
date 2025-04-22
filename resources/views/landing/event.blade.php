<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Syihab Store</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

    @livewireStyles
</head>

<body class="bg-gray-100 text-gray-800">

    <!-- Navigation -->
    <livewire:navigation />

    <!-- event -->
    <livewire:events-syihab />

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
