<div class="max-w-full px-4 sm:px-6 lg:px-8 sm:py-4 lg:py-12">
    <!-- Tampilan Desktop (grid 2 kolom) -->
    <div class="hidden md:grid grid-cols-1 md:grid-cols-2 gap-8 h-auto">
        <!-- Kolom Kiri -->
        <div
            class="group animate-fade-in-left overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 flex flex-col">
            <a href="#" wire:click.prevent="lihatProduk" class="block flex-grow">
                <img src="{{ asset('img/syihab.jpg') }}" alt="HP Terbaru"
                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
            </a>
            <div class="p-4 bg-white flex justify-center">
                <button wire:click="lihatProduk"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-full transition flex items-center space-x-2 shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <span>Lihat Produk</span>
                </button>
            </div>
        </div>

        <!-- Kolom Kanan -->
        <div
            class="group animate-fade-in-right overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 flex flex-col">
            <a href="#" wire:click.prevent="tukarSekarang" class="block flex-grow">
                <img src="{{ asset('img/bekas-gsk.jpg') }}" alt="Tukar Tambah"
                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
            </a>
            <div class="p-4 bg-white flex justify-center">
                <button wire:click="tukarSekarang"
                    class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded-full transition flex items-center space-x-2 shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                    </svg>
                    <span>Tukar Sekarang</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Tampilan Mobile (grid 2 kolom) -->
    <div class="md:hidden grid grid-cols-2 gap-4 mt-6">
        <!-- Item 1 -->
        <div class="overflow-hidden rounded-xl shadow-lg flex flex-col">
            <a href="#" wire:click.prevent="lihatProduk" class="block flex-grow">
                <img src="{{ asset('img/syihab-mobile.jpg') }}" alt="HP Baru" class="w-full h-full object-cover">
            </a>
            <div class="p-2 bg-white flex justify-center">
                <button wire:click="lihatProduk"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-full text-xs flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    Lihat Produk
                </button>
            </div>
        </div>

        <!-- Item 2 -->
        <div class="overflow-hidden rounded-xl shadow-lg flex flex-col">
            <a href="#" wire:click.prevent="tukarSekarang" class="block flex-grow">
                <img src="{{ asset('img/bekas-gsk-mobile.jpg') }}" alt="Tukar Tambah"
                    class="w-full h-full object-cover">
            </a>
            <div class="p-2 bg-white flex justify-center">
                <button wire:click="tukarSekarang"
                    class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-full text-xs flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                    </svg>
                    Tukar Sekarang
                </button>
            </div>
        </div>
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