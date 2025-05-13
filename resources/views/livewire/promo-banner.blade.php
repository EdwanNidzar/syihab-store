<div class="max-w-full px-4 sm:px-6 lg:px-8 sm:py-2 lg:py-12">
    <!-- Tampilan Desktop (grid 2 kolom) -->
    <div class="hidden md:grid grid-cols-1 md:grid-cols-2 gap-8 h-auto"> <!-- Tinggi container diperbesar -->
        <!-- Kolom Kiri -->
        <a href="#" wire:click.prevent="lihatProduk"
            class="relative group animate-fade-in-left overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 h-full">
            <img src="{{ asset('img/syihab.jpg') }}" alt="HP Terbaru"
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
        </a>

        <!-- Kolom Kanan -->
        <a href="#" wire:click.prevent="tukarSekarang"
            class="relative group animate-fade-in-right overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 h-full">
            <img src="{{ asset('img/bekas-gsk.jpg') }}" alt="Tukar Tambah"
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
        </a>
    </div>

    <!-- Tampilan Mobile (grid 2 kolom samping-samping) -->
    <div class="md:hidden grid grid-cols-2 gap-4">
        <!-- Item 1 -->
        <a href="#" wire:click.prevent="lihatProduk"
            class="relative group overflow-hidden rounded-xl shadow-lg h-40 sm:h-48">
            <img src="{{ asset('img/syihab-mobile.jpg') }}" alt="HP Baru"
                class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
        </a>

        <!-- Item 2 -->
        <a href="#" wire:click.prevent="tukarSekarang"
            class="relative group overflow-hidden rounded-xl shadow-lg h-40 sm:h-48">
            <img src="{{ asset('img/bekas-gsk-mobile.jpg') }}" alt="Tukar Tambah"
                class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
        </a>
    </div>

    <!-- CSS Animasi -->
    <style>
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        .animate-fade-in-down {
            animation: fadeInDown 0.7s ease-out forwards;
        }
        .animate-fade-in-left {
            animation: fadeInLeft 0.7s ease-out forwards;
        }
        .animate-fade-in-right {
            animation: fadeInRight 0.7s ease-out forwards;
        }
    </style>
</div>