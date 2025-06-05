<div>
    {{-- Brands Section --}}
    <div class="overflow-x-auto">
        <div class="grid grid-flow-col auto-cols-[minmax(80px,1fr)] sm:grid-cols-6 md:grid-cols-8 gap-3 sm:gap-4 min-w-max bg-white p-3 sm:p-4 rounded">
            @foreach ($brands as $brand)
                <div class="text-center group">
                    <a href="{{ route('brand-detail', $brand->slug) }}" class="block">
                        <!-- Image container -->
                        <div class="h-16 sm:h-20 overflow-hidden relative">
                            <img src="{{ asset('img/brandlist/' . $brand->slug . '.png') }}" alt="{{ $brand->name }}" style="width: 100px; height: 100px; ">
                        </div>
                        <!-- Brand name -->
                        <div class="mt-1 sm:mt-2 p-1 sm:p-2 font-medium text-xs sm:text-sm text-gray-700 truncate">
                            {{ $brand->name }}
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Price Variants Section --}}
    <div class="overflow-x-auto mt-3 sm:mt-4">
        <div class="grid grid-flow-col auto-cols-[minmax(90px,1fr)] sm:grid-cols-6 md:grid-cols-8 gap-3 sm:gap-4 min-w-max bg-white p-3 sm:p-4 rounded">
            @foreach ($priceVariants as $variant)
                <a href="{{ route('products.category', str_replace(' ', '-', strtolower($variant['label']))) }}"
                    class="bg-[#0d545a] text-white text-center p-2 sm:p-4 rounded shadow hover:bg-[#0e6a72] transition cursor-pointer block">
                    <div class="font-bold text-xs sm:text-sm">{{ $variant['label'] }}</div>
                </a>
            @endforeach
        </div>
    </div>
</div>
