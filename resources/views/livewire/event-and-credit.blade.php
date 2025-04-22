<div class="container mx-auto px-3 py-4 max-w-7xl">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-4 bg-white rounded-lg shadow">
        <!-- Kolom Event -->
        <div wire:click="events"
            class="cursor-pointer flex justify-center items-center hover:scale-105 transition-transform duration-300">
            <img src="{{ asset('img/eventandcredit/Syihab-event.jpg') }}" alt="Event Image"
                class="w-full h-auto rounded-lg shadow">
        </div>

        <!-- Kolom Kredit -->
        <div wire:click="credits"
            class="cursor-pointer flex justify-center items-center hover:scale-105 transition-transform duration-300">
            <img src="{{ asset('img/eventandcredit/kredit.jpg') }}" alt="Kredit Image"
                class="w-full h-auto rounded-lg shadow">
        </div>
    </div>
</div>
