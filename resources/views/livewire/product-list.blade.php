<div>
    <!-- Header -->
    <div class="text-center py-6">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Semua Produk</h1>
        <p class="text-gray-600 max-w-2xl mx-auto">Temukan berbagai produk unggulan yang tersedia di Syihab Store</p>
    </div>

    @foreach ($brands as $brand)
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-12">
            <!-- Brand Header -->
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <h2 class="text-xl font-bold">{{ $brand->name }}</h2>
                </div>
                <a href="{{ route('brand-detail', $brand->slug) }}"
                    class="text-blue-600 hover:text-blue-800 font-medium flex items-center text-sm">
                    Lihat Semua
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

            <!-- Produk Grid -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($brand->products->take($loadedCounts[$brand->id] ?? $perBrand) as $product)
                    <div class="bg-white rounded-lg shadow hover:shadow-md transition p-4 flex flex-col h-full">
                        <div class="product-image-container mb-3 rounded-md overflow-hidden flex-grow-0">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                class="w-full h-48 object-cover">
                        </div>

                        <div class="flex-grow">
                            <h3 class="text-lg font-semibold mb-2">{{ $product->name }}</h3>

                            @if ($product->variations)
                                <p class="text-sm text-gray-600 mb-2">
                                    Mulai dari
                                    <span class="font-bold text-green-600">
                                        Rp
                                        {{ number_format(min(array_column($product->variations, 'price')), 0, ',', '.') }}
                                    </span>
                                </p>
                            @endif
                        </div>

                        <a href="{{ route('product-detail', $product->slug) }}"
                            class="text-blue-600 hover:text-blue-800 font-medium text-sm mt-2 inline-block">
                            Lihat Detail
                        </a>
                    </div>
                @endforeach
            </div>

            <!-- Load More Button -->
            @if ($brand->products->count() > ($loadedCounts[$brand->id] ?? $perBrand))
                <div class="text-center mt-6">
                    <button wire:click="loadMore({{ $brand->id }})" wire:loading.attr="disabled"
                        class="px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg text-gray-700 font-medium transition flex items-center justify-center mx-auto">
                        <span wire:loading.remove>Muat lebih banyak</span>
                        <span wire:loading>
                            <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-gray-700"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            Memuat...
                        </span>
                    </button>
                </div>
            @endif
        </div>
    @endforeach
</div>
