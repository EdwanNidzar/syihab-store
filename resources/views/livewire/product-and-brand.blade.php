<div class="container mx-auto px-3 py-4 max-w-7xl mt-10">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        {{-- Produk Terbaru --}}
        <div>
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">Produk Terbaru</h2>
                <a href="{{ route('products') }}" class="text-blue-600 text-sm hover:text-blue-800 transition">Lihat Semua Produk
                    &rarr;</a>
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
                                        <img src="{{ asset('storage/' . $produk->image) }}" alt="{{ $produk->name }}"
                                            class="max-h-full max-w-full object-contain p-2" loading="lazy"
                                            decoding="async">
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-black/10 to-transparent opacity-0 hover:opacity-100 transition-opacity">
                                        </div>
                                    </div>
                                    <h3 class="text-sm font-semibold truncate">{{ $produk->name }}</h3>
                                    <a href="{{ route('product-detail', $produk->slug) }}"
                                        class="text-blue-600 text-sm hover:text-blue-800 transition block mt-2 z-10 relative">Lihat Detail</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Navigation buttons -->
                    <div class="swiper-button-prev produk-prev hidden md:flex text-gray-500 hover:text-gray-700"></div>
                    <div class="swiper-button-next produk-next hidden md:flex text-gray-500 hover:text-gray-700"></div>
                </div>
            </div>
        </div>

        {{-- Pilihan Merek --}}
        <div>
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">Pilihan Merek</h2>
                <a href="{{ route('brands') }}" class="text-blue-600 text-sm hover:text-blue-800 transition">Lihat Semua Merek
                    &rarr;</a>
            </div>
            <div class="relative">
                <div class="swiper brandSwiper">
                    <div class="swiper-wrapper">
                        @foreach ($merekAktif as $merek)
                            <div class="swiper-slide">
                                <div
                                    class="bg-white rounded-lg shadow p-4 w-full max-w-[14rem] mx-auto hover:shadow-md transition">
                                    <!-- Top spacer to match product card padding -->
                                    <div class="h-[1.5rem]"></div>

                                    <!-- Logo container matching product image area -->
                                    <div class="h-36 mb-2 flex items-center justify-center">
                                        <img src="{{ asset('storage/' . $merek->logo) }}" alt="{{ $merek->name }}"
                                            class="max-h-[80%] max-w-[80%] object-contain" loading="lazy"
                                            decoding="async">
                                    </div>

                                    <!-- Bottom spacer to perfectly match product card text area height -->
                                    <div class="h-[1.5rem] flex items-end">
                                        <div class="w-full border-t border-gray-100 mt-2"></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Navigation buttons -->
                    <div class="swiper-button-prev brand-prev hidden md:flex text-gray-500 hover:text-gray-700"></div>
                    <div class="swiper-button-next brand-next hidden md:flex text-gray-500 hover:text-gray-700"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    /* Fix for clickable links inside swiper */
    .swiper-slide {
        height: auto;
        pointer-events: auto !important;
    }
    .swiper-slide > div {
        height: 100%;
    }
    .swiper {
        overflow: visible;
    }
</style>
@endpush

@push('scripts')
    <script>
        // Product Swiper with responsive settings
        new Swiper('.produkSwiper', {
            slidesPerView: 1.5,
            spaceBetween: 16,
            grabCursor: true,
            loop: true,
            noSwiping: false,
            noSwipingClass: 'swiper-slide',
            preventInteractionOnTransition: false,
            watchSlidesProgress: true,
            slideActiveClass: 'swiper-slide-active',
            navigation: {
                nextEl: '.produk-next',
                prevEl: '.produk-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 2.5,
                },
                768: {
                    slidesPerView: 3,
                },
                1024: {
                    slidesPerView: 3,
                }
            }
        });

        // Brand Swiper with responsive settings
        new Swiper('.brandSwiper', {
            slidesPerView: 1.5,
            spaceBetween: 16,
            grabCursor: true,
            loop: true,
            noSwiping: false,
            noSwipingClass: 'swiper-slide',
            preventInteractionOnTransition: false,
            watchSlidesProgress: true,
            slideActiveClass: 'swiper-slide-active',
            navigation: {
                nextEl: '.brand-next',
                prevEl: '.brand-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 2.5,
                },
                768: {
                    slidesPerView: 3,
                },
                1024: {
                    slidesPerView: 3,
                }
            }
        });
    </script>
@endpush