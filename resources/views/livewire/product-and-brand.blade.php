<div class="container mx-auto px-3 py-4 max-w-7xl mt-4 md:mt-10">
    <!-- Mobile Layout -->
    <div class="block md:hidden">
        {{-- Produk Terbaru --}}
        <div class="mb-6">
            <div class="flex justify-between items-center mb-3 px-1">
                <h2 class="text-lg font-bold">Produk Terbaru</h2>
                <a href="{{ route('products') }}" class="text-blue-600 text-xs hover:text-blue-800 transition">Lihat Semua
                    &rarr;</a>
            </div>
            <div class="relative">
                <div class="swiper produkSwiperMobile">
                    <div class="swiper-wrapper">
                        @foreach ($produkTerbaru as $produk)
                            <div class="swiper-slide px-1">
                                <div
                                    class="bg-white rounded-lg shadow p-3 w-full max-w-[13rem] mx-auto hover:shadow-md transition relative">
                                    <div
                                        class="h-32 mb-1.5 rounded overflow-hidden bg-gray-100 flex items-center justify-center">
                                        @if (!empty($produk->is_preorder))
                                            <div class="absolute top-2 right-2 z-10">
                                                <div
                                                    class="bg-purple-100 w-10 h-10 rounded-full flex items-center justify-center relative drop-shadow-lg">
                                                    <img src="{{ asset('img/pre-order.png') }}" alt="Pre Order"
                                                        class="w-4 h-4">
                                                </div>
                                            </div>
                                        @endif
                                        <img src="{{ asset('storage/' . $produk->image) }}" alt="{{ $produk->name }}"
                                            class="max-h-full max-w-full object-contain p-1" loading="lazy"
                                            decoding="async">
                                    </div>
                                    <h3 class="text-sm font-semibold truncate">{{ $produk->name }}</h3>
                                    <p class="text-sm text-gray-600">
                                        @if (empty($produk->variations) || count($produk->variations) === 0)
                                            Pre Order
                                        @else
                                            @php
                                                // Ambil harga terendah dari semua variasi
                                                $prices = array_column($produk->variations, 'price');
                                                $prices = array_filter($prices, function ($price) {
                                                    return $price !== null;
                                                });
                                            @endphp

                                            @if (empty($prices))
                                                Pre Order
                                            @else
                                                Rp {{ number_format(min($prices), 0, ',', '.') }}
                                                @if (count($prices) > 1)
                                                    <span class="text-xs">↑</span>
                                                @endif
                                            @endif
                                        @endif
                                    </p>
                                    <a href="{{ route('product-detail', $produk->slug) }}"
                                        class="text-blue-600 text-xs hover:text-blue-800 transition block mt-1.5 z-10 relative">Lihat
                                        Detail</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{-- Pilihan Merek --}}
        <div class="mb-6">
            <div class="flex justify-between items-center mb-3 px-1">
                <h2 class="text-lg font-bold">Pilihan Merek</h2>
                <a href="{{ route('brands') }}" class="text-blue-600 text-xs hover:text-blue-800 transition">Lihat Semua
                    &rarr;</a>
            </div>
            <div class="relative">
                <div class="swiper brandSwiperMobile">
                    <div class="swiper-wrapper">
                        @foreach ($merekAktif as $merek)
                            <div class="swiper-slide px-1">
                                <div class="flex justify-center items-center p-3 bg-white rounded-lg shadow h-full">
                                    <img src="{{ asset('storage/' . ($merek->logo ?? 'default-logo.png')) }}"
                                        alt="{{ $merek->name }}" class="w-auto h-14 object-contain" />
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Desktop Layout -->
    <div class="hidden md:grid grid-cols-1 md:grid-cols-2 gap-6">
        {{-- Produk Terbaru --}}
        <div>
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">Produk Terbaru</h2>
                <a href="{{ route('products') }}" class="text-blue-600 text-sm hover:text-blue-800 transition">Lihat
                    Semua Produk &rarr;</a>
            </div>
            <div class="relative">
                <div class="swiper produkSwiper">
                    <div class="swiper-wrapper">
                        @foreach ($produkTerbaru as $produk)
                            <div class="swiper-slide">
                                <div
                                    class="bg-white rounded-lg shadow p-4 w-full max-w-[14rem] mx-auto hover:shadow-md transition relative">
                                    <div
                                        class="h-36 mb-2 rounded overflow-hidden bg-gray-100 flex items-center justify-center">
                                        @if (!empty($produk->is_preorder))
                                            <div class="absolute top-2 right-2 z-10">
                                                <div
                                                    class="bg-purple-100 w-12 h-12 rounded-full flex items-center justify-center relative drop-shadow-lg">
                                                    <img src="{{ asset('img/pre-order.png') }}" alt="Pre Order"
                                                        class="w-5 h-5">
                                                </div>
                                            </div>
                                        @endif
                                        <img src="{{ asset('storage/' . $produk->image) }}" alt="{{ $produk->name }}"
                                            class="max-h-full max-w-full object-contain p-2" loading="lazy"
                                            decoding="async">
                                    </div>
                                    <h3 class="text-sm font-semibold truncate">{{ $produk->name }}</h3>
                                    <a href="{{ route('product-detail', $produk->slug) }}"
                                        class="text-blue-600 text-sm hover:text-blue-800 transition block mt-2 z-10 relative">Lihat
                                        Detail</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-prev produk-prev hidden md:flex text-gray-500 hover:text-gray-700"></div>
                    <div class="swiper-button-next produk-next hidden md:flex text-gray-500 hover:text-gray-700"></div>
                </div>
            </div>
        </div>

        {{-- Pilihan Merek --}}
        <div>
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">Pilihan Merek</h2>
                <a href="{{ route('brands') }}" class="text-blue-600 text-sm hover:text-blue-800 transition">Lihat
                    Semua Merek &rarr;</a>
            </div>
            <div class="relative">
                <div class="swiper brandSwiper">
                    <div class="swiper-wrapper">
                        @foreach ($merekAktif as $merek)
                            <div class="swiper-slide">
                                <div
                                    class="bg-white rounded-lg shadow p-4 w-full max-w-[14rem] mx-auto hover:shadow-md transition">
                                    <div class="h-[1.5rem]"></div>
                                    <div class="h-36 mb-2 flex items-center justify-center">
                                        <img src="{{ asset('storage/' . $merek->logo) }}" alt="{{ $merek->name }}"
                                            class="max-h-[80%] max-w-[80%] object-contain" loading="lazy"
                                            decoding="async">
                                    </div>
                                    <div class="h-[1.5rem] flex items-end">
                                        <div class="w-full border-t border-gray-100 mt-2"></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-prev brand-prev hidden md:flex text-gray-500 hover:text-gray-700"></div>
                    <div class="swiper-button-next brand-next hidden md:flex text-gray-500 hover:text-gray-700"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
    <style>
        .swiper-slide {
            height: auto;
            pointer-events: auto !important;
        }

        .swiper-slide>div {
            height: 100%;
        }

        .swiper {
            overflow: visible;
        }

        .swiper-button-prev:after,
        .swiper-button-next:after {
            font-size: 1.2rem;
            color: currentColor;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile Swipers
            if (window.innerWidth < 768) {
                new Swiper('.produkSwiperMobile', {
                    slidesPerView: 1.4,
                    spaceBetween: 6,
                    freeMode: true,
                    loop: false
                });

                new Swiper('.brandSwiperMobile', {
                    slidesPerView: 1.8,
                    spaceBetween: 6,
                    freeMode: true,
                    loop: false
                });
            }

            // Desktop Swipers with loop condition
            const initDesktopSwipers = () => {
                // Product Swiper
                const productSlides = document.querySelectorAll('.produkSwiper .swiper-slide').length;
                new Swiper('.produkSwiper', {
                    slidesPerView: 1.5,
                    spaceBetween: 16,
                    grabCursor: true,
                    loop: productSlides > 3, // Only enable loop if more than 3 slides
                    navigation: {
                        nextEl: '.produk-next',
                        prevEl: '.produk-prev',
                    },
                    breakpoints: {
                        640: {
                            slidesPerView: 2.5,
                            loop: productSlides > 5 // Adjust loop condition for breakpoint
                        },
                        768: {
                            slidesPerView: 3,
                            loop: productSlides > 3
                        },
                        1024: {
                            slidesPerView: 3,
                            loop: productSlides > 3
                        }
                    }
                });

                // Brand Swiper
                const brandSlides = document.querySelectorAll('.brandSwiper .swiper-slide').length;
                new Swiper('.brandSwiper', {
                    slidesPerView: 1.5,
                    spaceBetween: 16,
                    grabCursor: true,
                    loop: brandSlides > 3, // Only enable loop if more than 3 slides
                    navigation: {
                        nextEl: '.brand-next',
                        prevEl: '.brand-prev',
                    },
                    breakpoints: {
                        640: {
                            slidesPerView: 2.5,
                            loop: brandSlides > 5
                        },
                        768: {
                            slidesPerView: 3,
                            loop: brandSlides > 3
                        },
                        1024: {
                            slidesPerView: 3,
                            loop: brandSlides > 3
                        }
                    }
                });
            };

            initDesktopSwipers();
        });
    </script>
@endpush
