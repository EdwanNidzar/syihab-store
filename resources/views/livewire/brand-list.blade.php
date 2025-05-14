<div>
    {{-- Wrapper scrollable --}}
    <div class="overflow-x-auto">
        <div class="grid grid-cols-8 gap-4 min-w-[800px] bg-white p-4 rounded">
            @foreach ($brands as $brand)
                <div class="text-center p-4 border rounded shadow hover:shadow-md transition">
                    <a href="{{ route('brand-detail', $brand->slug) }}">
                        <img src="{{ Storage::url($brand->logo) }}" alt="{{ $brand->name }}" class="w-full h-auto">
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <div class="overflow-x-auto mt-4">
        <div class="grid grid-cols-8 gap-4 min-w-[800px] bg-white p-4 rounded">
            @foreach ($priceVariants as $variant)
                <a href="{{ route('products.category', str_replace(' ', '-', strtolower($variant['label']))) }}"
                    class="bg-gray-100 text-center p-4 rounded shadow hover:bg-gray-200 transition cursor-pointer block">
                    <div class="font-bold text-sm">{{ $variant['label'] }}</div>
                </a>
            @endforeach
        </div>
    </div>

</div>
