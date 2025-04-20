<div class="container mx-auto px-4 py-8 max-w-7xl">
    <!-- Header dengan animasi -->
    <div class="text-center mb-12">
        <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4 tracking-tight animate-fade-in-down">
            TEMUKAN TOKO KAMI
        </h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">
            Kunjungi toko terdekat kami dan dapatkan pengalaman belanja terbaik
        </p>
    </div>

    <!-- Grid Responsif -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($stores as $store)
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <div class="p-6">
                    <div class="flex items-start mb-4">
                        <!-- Icon (gunakan Heroicons atau library lain) -->
                        <div class="bg-blue-100 p-3 rounded-full mr-4">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800">{{ $store['name'] }}</h3>
                            <p class="mt-2 text-gray-600">{{ $store['address'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
