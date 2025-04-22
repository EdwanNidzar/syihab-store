<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h1 class="text-2xl sm:text-3xl font-extrabold text-center text-gray-900 mb-6 sm:mb-8 tracking-tight">
        SYIHAB EVENT EXPERIENCE
    </h1>
    <div x-data="{
        showModal: false,
        videos: [],
        currentVideoIndex: 0,
        closeModal() {
            this.showModal = false;
            if (this.$refs.videoPlayer) {
                this.$refs.videoPlayer.pause();
            }
        }
    }" @keydown.window.escape="closeModal">
        <!-- Product Grid -->
        <div class="grid grid-cols-2 md:grid-cols-2 gap-8">
            @foreach ($events as $event)
                <div @click="
                videos = {{ json_encode($event->video) }};
                currentVideoIndex = 0;
                showModal = true;
                $nextTick(() => { $refs.videoPlayer?.load(); });
            "
                    class="cursor-pointer hover:scale-105 transition-transform duration-300 rounded overflow-hidden shadow relative">
                    <img src="{{ asset('storage/' . $event->thumbnail) }}" alt="{{ $event->name }}" class="w-full h-auto">
                    <div class="p-2 text-center font-semibold">{{ $event->name }}</div>
                    @if (count($event->video) > 1)
                        <div class="absolute top-2 right-2 bg-black bg-opacity-50 text-white px-2 py-1 rounded-full text-xs">
                            {{ count($event->video) }} videos
                        </div>
                    @endif
                </div>
            @endforeach
        </div>

        <!-- Video Modal -->
        <div x-show="showModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-75" style="display: none"
            @click.self="closeModal">

            <div class="bg-white rounded-lg w-full max-w-sm mx-2 flex flex-col" style="max-height: 80vh;">
                <!-- Video Player (auto height) dengan Close Button di dalamnya -->
                <div class="relative bg-black">
                    <!-- Close Button dipindah ke dalam video container -->
                    <button @click="closeModal"
                        class="absolute top-1 right-1 text-white bg-black bg-opacity-50 hover:bg-opacity-70 text-xl focus:outline-none focus:ring-2 focus:ring-white rounded-full w-8 h-8 flex items-center justify-center z-10"
                        aria-label="Close modal">
                        &times;
                    </button>

                    <video controls class="w-full max-h-[50vh]" x-ref="videoPlayer" preload="metadata">
                        <source
                            :src="'{{ asset('storage') }}/' + (typeof videos[currentVideoIndex] === 'object' ? videos[
                                currentVideoIndex].file : videos[currentVideoIndex])"
                            type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>

                <!-- Navigation -->
                <div class="p-3">
                    <div class="flex justify-between items-center" x-show="videos.length > 1">
                        <button
                            @click="
                            currentVideoIndex = (currentVideoIndex - 1 + videos.length) % videos.length;
                            $nextTick(() => $refs.videoPlayer.load());
                        "
                            :disabled="currentVideoIndex === 0"
                            class="px-3 py-1 bg-gray-200 rounded disabled:opacity-50 hover:bg-gray-300 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                            Previous
                        </button>

                        <div class="text-center text-sm">
                            <span x-text="currentVideoIndex + 1"></span> of <span x-text="videos.length"></span>
                        </div>

                        <button
                            @click="
                            currentVideoIndex = (currentVideoIndex + 1) % videos.length;
                            $nextTick(() => $refs.videoPlayer.load());
                        "
                            :disabled="currentVideoIndex === videos.length - 1"
                            class="px-3 py-1 bg-gray-200 rounded disabled:opacity-50 hover:bg-gray-300 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                            Next
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>