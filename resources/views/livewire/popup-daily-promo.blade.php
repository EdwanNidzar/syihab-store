<!-- resources/views/livewire/popup-daily-promo.blade.php -->
<div id="promoModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white max-w-md w-full relative">
        <!-- Tombol Close -->
        <button onclick="closeModal('promoModal')" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        <!-- Konten Promo -->
        <div class="p-0">
            @if ($dailyPromo?->image)
                <img src="{{ asset('storage/' . $dailyPromo->image) }}" alt="{{ $dailyPromo->title }}"
                     class="w-full h-full object-cover">
            @endif
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Fungsi Modal
    function openModal(modalId) {
        document.getElementById(modalId).classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    // Tampilkan modal otomatis saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function () {
        openModal('promoModal');
    });
</script>
@endpush