<nav class="bg-white shadow-lg sticky top-0 z-50">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="/" class="text-2xl font-bold text-gray-800">
                    Syihab Store
                </a>
            </div>

            <!-- Search -->
            <div class="relative w-1/3">
                <input wire:model.debounce.300ms="search" 
                       type="text" 
                       placeholder="Cari produk..." 
                       class="w-full px-4 py-2 rounded-full border focus:outline-none focus:ring-2 focus:ring-blue-500">
                
                {{-- @if($search && $results->count())
                    <div class="absolute z-10 w-full mt-2 bg-white border rounded-lg shadow-lg">
                        @foreach($results as $product)
                            <a href="{{ route('products.show', $product) }}" 
                               class="block px-4 py-2 hover:bg-gray-100">
                                {{ $product->name }}
                            </a>
                        @endforeach
                    </div>
                @endif --}}
            </div>

            <!-- Menu -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="#" class="text-gray-800 hover:text-blue-600">Produk</a>
                <a href="#" class="text-gray-800 hover:text-blue-600">Promo</a>
                <a href="#" class="text-gray-800 hover:text-blue-600">Tentang Kami</a>
            </div>
        </div>
    </div>
</nav>