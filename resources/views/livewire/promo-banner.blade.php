<div class="flex items-center justify-center bg-gray-100 mt-4 mb-4 px-4">
    <div
        class="group relative overflow-hidden rounded-3xl shadow-lg hover:shadow-2xl transform transition-all duration-500 bg-white max-w-screen-md w-full hover:ring-2 hover:ring-green-400">

        <a href="#" wire:click.prevent="tukarSekarang" class="block relative w-full h-full overflow-hidden">
            <img src="{{ asset('img/Harga-Tukar-Tambah.jpg') }}" alt="Tukar Tambah"
                class="w-full h-full object-cover transition-transform duration-500 ease-in-out group-hover:scale-110 max-h-[400px] rounded-t-3xl">
            <div class="absolute inset-0 bg-black bg-opacity-20 group-hover:bg-opacity-30 transition-all duration-300">
            </div>
        </a>

        <div class="p-5 bg-white flex items-center justify-center">
            <button wire:click="tukarSekarang"
                class="bg-gradient-to-r from-green-500 to-green-700 hover:from-green-600 hover:to-green-800 text-white font-semibold py-2 px-6 rounded-full shadow-md transform hover:scale-105 transition-all duration-300 flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                </svg>
                <span class="tracking-wide">Tukar Sekarang</span>
            </button>
        </div>
    </div>

    <style>
        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(40px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .group {
            animation: fadeInRight 0.8s ease-out forwards;
        }
    </style>
</div>