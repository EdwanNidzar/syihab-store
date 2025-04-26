<div class="flex flex-col items-center space-y-6 mt-8 mb-8">
    <h1 class="text-2xl sm:text-3xl font-extrabold text-center text-gray-900 mb-6 sm:mb-8 tracking-tight">
        Pilih Smartphone Sesuai Budget
    </h1>

    <div class="grid grid-cols-3 md:grid-cols-3 gap-2 md:gap-6">
        <a 
            href="{{ route('products.category', 'entry') }}" 
            class="px-6 py-4 bg-white rounded-lg shadow hover:shadow-md transition text-center
                {{ request()->route('category') === 'entry' ? 'border-2 border-blue-500' : '' }}">
            <div class="text-lg font-semibold text-gray-800">Entry Level</div>
            <div class="text-sm text-gray-500">(Rp 0 - 4 jutaan)</div>
        </a>

        <a 
            href="{{ route('products.category', 'mid') }}" 
            class="px-6 py-4 bg-white rounded-lg shadow hover:shadow-md transition text-center
                {{ request()->route('category') === 'mid' ? 'border-2 border-blue-500' : '' }}">
            <div class="text-lg font-semibold text-gray-800">Mid Range</div>
            <div class="text-sm text-gray-500">(Rp 4 - 7 jutaan)</div>
        </a>

        <a 
            href="{{ route('products.category', 'flagship') }}" 
            class="px-6 py-4 bg-white rounded-lg shadow hover:shadow-md transition text-center
                {{ request()->route('category') === 'flagship' ? 'border-2 border-blue-500' : '' }}">
            <div class="text-lg font-semibold text-gray-800">Flagship</div>
            <div class="text-sm text-gray-500">(≥ Rp 8 jutaan)</div>
        </a>
    </div>
</div>
