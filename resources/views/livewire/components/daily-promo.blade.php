<div class="promo-slider-component">
    <div class="promo-banner-container">
        <!-- Text Header -->
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-900">DAPATKAN PROMO</h2>
            <h2 class="text-3xl font-bold text-gray-900">SETIAP HARI</h2>
        </div>

        <!-- Swiper Promo Slider -->
        <div class="swiper daily-promo-swiper">
            <div class="swiper-wrapper">
                @foreach($promos as $promo)
                <div class="swiper-slide">
                    <div class="instagram-feed-container">
                        <img 
                            src="{{ asset('storage/' . $promo->image) }}" 
                            alt="{{ $promo->name }}" 
                            class="instagram-feed-image"
                            loading="lazy"
                        >
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Swiper Pagination -->
            @if(count($promos) > 1)
            <div class="swiper-pagination daily-promo-pagination"></div>
            @endif
        </div>
    </div>

    <style>
        .promo-banner-container {
            max-width: 1080px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        .daily-promo-swiper {
            width: 100%;
            max-width: 1080px;
            margin: 0 auto;
            min-height: 500px;
        }

        .instagram-feed-container {
            position: relative;
            width: 100%;
            padding-bottom: 125%;
            overflow: hidden;
            background: #f5f5f5;
        }

        .instagram-feed-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .daily-promo-pagination {
            position: relative;
            margin-top: 1rem;
        }
    </style>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new Swiper('.daily-promo-swiper', {
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                loop: true,
                pagination: {
                    el: '.daily-promo-pagination',
                    clickable: true,
                },
                slidesPerView: 1,
                spaceBetween: 30,
                centeredSlides: true,
                speed: 600,
            });
        });
    </script>
    @endpush
</div>
