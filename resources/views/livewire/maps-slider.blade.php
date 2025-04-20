<div class="p-4 relative" wire:key="maps-slider-container">
    <!-- Swiper Container (Full Width) -->
    <div class="swiper single-slide-swiper" wire:ignore>
        <div class="swiper-wrapper">
            @foreach ($tokos as $index => $toko)
                <div class="swiper-slide">
                    <div class="flex flex-col items-center">
                        <div class="cursor-pointer w-full max-w-md" wire:click="showMap({{ $index }})">
                            <img src="{{ asset('img/' . $toko['foto']) }}"
                                class="w-full h-64 md:h-80 object-cover rounded-lg shadow-lg mx-auto hover:opacity-90 transition-opacity"
                                alt="{{ $toko['nama'] }}" loading="lazy"
                                @if ($loop->first) fetchpriority="high" @endif>
                            <p class="mt-4 text-lg font-semibold text-gray-800">{{ $toko['nama'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Navigation Buttons -->
        <div class="swiper-button-next !text-white !bg-primary-500/80 !w-12 !h-12 rounded-full after:!text-xl"></div>
        <div class="swiper-button-prev !text-white !bg-primary-500/80 !w-12 !h-12 rounded-full after:!text-xl"></div>

    </div>

    <!-- Maps Modal -->
    @if ($selectedMapUrl)
        <div class="fixed inset-0 z-[100] flex items-center justify-center bg-black/60 backdrop-blur-sm"
            x-data="{ open: true }" x-show="open" x-transition @keydown.escape.window="open = false"
            wire:key="map-modal-{{ $activeSlideIndex }}">

            <div class="bg-white rounded-lg overflow-hidden w-full max-w-4xl mx-4 shadow-2xl">
                <div class="flex justify-between items-center p-4 border-b bg-gray-50">
                    <h2 class="text-lg font-semibold text-gray-800">
                        <x-icons.map-marker class="w-5 h-5 inline mr-2 text-red-500" />
                        {{ $tokos[$activeSlideIndex]['nama'] }}
                    </h2>
                    <button @click="open = false" wire:click="closeMap"
                        class="p-1 rounded-full hover:bg-gray-200 transition-colors" aria-label="Tutup peta">
                        <x-icons.close class="w-6 h-6 text-gray-500" />
                    </button>
                </div>

                <div class="aspect-video w-full">
                    <iframe src="{{ $selectedMapUrl }}&zoom=15" width="100%" height="100%" style="border:0;"
                        allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                        title="Lokasi {{ $tokos[$activeSlideIndex]['nama'] }} di Google Maps">
                    </iframe>
                </div>

                <div class="p-3 bg-gray-50 text-right border-t">
                    <a href="{{ $maps_url }}" target="_blank"
                        class="inline-flex items-center text-sm text-primary-600 hover:text-primary-800">
                        Buka di Google Maps
                        <x-icons.external-link class="w-4 h-4 ml-1" />
                    </a>
                </div>
            </div>
        </div>
    @endif
    <!-- End of Maps Modal -->
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const swiper = new Swiper(".single-slide-swiper", {
                slidesPerView: 1,
                spaceBetween: 20,
                centeredSlides: true,
                loop: true, // Enable looping untuk UX lebih baik
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                effect: 'fade', // Efek fade antara slide
                fadeEffect: {
                    crossFade: true
                },
            });

            // Handle window resize
            window.addEventListener('resize', () => swiper.update());
        });
    </script>
@endpush

@push('styles')
    <style>
        .single-slide-swiper {
            width: 100%;
            padding-bottom: 40px;
            /* Space untuk pagination */
        }

        .swiper-slide {
            opacity: 0 !important;
            /* Awalnya hidden untuk efek fade */
            transition: opacity 0.5s ease;
        }

        .swiper-slide-active {
            opacity: 1 !important;
        }

        .swiper-button-next,
        .swiper-button-prev {
            backdrop-filter: blur(4px);
            transition: all 0.3s ease;
        }

        .swiper-button-next:hover,
        .swiper-button-prev:hover {
            background: rgba(59, 130, 246, 0.9) !important;
            transform: scale(1.1);
        }

        .swiper-pagination-bullet {
            @apply bg-gray-300 opacity-100;
        }

        .swiper-pagination-bullet-active {
            @apply bg-primary-500;
        }
    </style>
@endpush
