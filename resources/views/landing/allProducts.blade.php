<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Produk - Syihab Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .product-image-container {
            height: 192px;
            /* 12rem (48px * 4) */
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background-color: #f3f4f6;
            /* bg-gray-100 */
        }

        .product-image {
            object-fit: contain;
            width: 100%;
            height: 100%;
            max-height: 100%;
            max-width: 100%;
        }

        /* Ensure the button stays at the bottom */
        .product-card {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .product-content {
            flex-grow: 1;
        }
    </style>
    @livewireStyles
</head>

<body class="bg-gray-100 text-gray-800">

    <!-- Navigation -->
    <livewire:navigation />

    <!-- Header -->
    <div class="p-6 mb-6 text-center">
        <h1 class="text-2xl font-bold">Semua Produk</h1>
        <p class="text-gray-600">Lihat berbagai produk unggulan dari Syihab Store</p>
    </div>

    <!-- Produk Grid -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($products as $product)
                <div class="bg-white rounded-lg shadow hover:shadow-md transition p-4 flex flex-col product-card">
                    <div class="product-image-container mb-3 rounded-md">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                            class="product-image">
                    </div>
                    <h2 class="text-lg font-semibold mb-1">{{ $product->name }}</h2>

                    @if (is_array($product->variations))
                        <ul class="text-sm text-gray-700 space-y-1 mb-2">
                            @foreach ($product->variations as $variant)
                                <li>
                                    {{ $variant['ram'] ?? 'RAM' }}GB /
                                    {{ $variant['storage'] ?? 'Storage' }}GB:
                                    <span class="font-medium text-green-600">Rp
                                        {{ number_format($variant['price'] ?? 0, 0, ',', '.') }}
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    <a href="{{ route('product-detail', $product->slug) }}"
                        class="mt-2 inline-block text-blue-600 hover:text-blue-800 font-medium">Lihat Detail</a>

                    <div class="product-content"></div> <!-- Empty div to take up space -->

                    {{-- Tombol Order --}}
                    <a href="https://wa.me/628115546464?text={{ urlencode('Halo admin call center Syihab Store, saya tertarik dengan produk ' . $product->name) }}"
                        target="_blank"
                        class="block text-center bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700
                     text-white font-semibold py-3 rounded-lg transition duration-200 shadow-md mt-4">
                        Pesan Sekarang
                    </a>
                </div>
            @empty
                <p class="col-span-full text-center text-gray-500">Tidak ada produk yang tersedia.</p>
            @endforelse
        </div>
    </div>

    <!-- Footer -->
    <livewire:footer />

    @livewireScripts
</body>

</html>
