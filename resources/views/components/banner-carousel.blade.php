<div class="swiper mySwiper w-full aspect-[1600/542] max-w-screen-2xl mx-auto rounded-lg overflow-hidden shadow-lg">
    <div class="swiper-wrapper">
        @foreach ($banners as $banner)
            <div class="swiper-slide">
                <img
                    src="{{ $banner['image'] }}"
                    alt="Banner"
                    class="w-full h-full object-cover object-center"
                >
            </div>
        @endforeach
    </div>

    <!-- Optional navigation -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        new Swiper(".mySwiper", {
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            slidesPerView: 1,
            spaceBetween: 30,
            centeredSlides: true,
            speed: 600,
        });
    });
</script>
@endpush
