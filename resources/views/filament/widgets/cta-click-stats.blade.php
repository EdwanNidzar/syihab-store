<x-filament-widgets::widget>
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden border border-gray-200 dark:border-gray-700">
        {{-- Filter Section --}}
        <div class="px-4 py-3 bg-gray-50 dark:bg-gray-700 border-b border-gray-200 dark:border-gray-700">
            <div class="flex flex-col space-y-4 sm:flex-row sm:space-y-0 sm:space-x-4 sm:items-end">
                <div class="flex-1">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">From date</label>
                    <input type="date" wire:model.defer="from"
                        class="block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                </div>

                <div class="flex-1">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">To date</label>
                    <input type="date" wire:model.defer="to"
                        class="block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                </div>

                <button type="button" wire:click="updateFilters"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 dark:focus:ring-offset-gray-800">
                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                            clip-rule="evenodd" />
                    </svg>
                    Apply Filters
                </button>

                @if ($from || $to)
                    <button type="button" wire:click="resetFilters"
                        class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 text-sm font-medium rounded-md text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 dark:focus:ring-offset-gray-800">
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                        Reset
                    </button>
                @endif
            </div>
        </div>

        {{-- Summary Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 p-4">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 border border-gray-200 dark:border-gray-700">
                <div class="flex items-center">
                    <svg class="h-6 w-6 text-primary-500 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M6.672 1.911a1 1 0 10-1.932.518l.259.966a1 1 0 001.932-.518l-.26-.966zM2.429 4.74a1 1 0 10-.517 1.932l.966.259a1 1 0 00.517-1.932l-.966-.26zm8.814-.569a1 1 0 00-1.415-1.414l-.707.707a1 1 0 101.415 1.415l.707-.708zm-7.071 7.072l.707-.707A1 1 0 003.465 9.12l-.708.707a1 1 0 001.415 1.415zm3.2-5.171a1 1 0 00-1.3 1.3l4 10a1 1 0 001.823.075l1.38-2.759 3.018 3.02a1 1 0 001.414-1.415l-3.019-3.02 2.76-1.379a1 1 0 00-.076-1.822l-10-4z"
                            clip-rule="evenodd" />
                    </svg>
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Clicks</p>
                        <p class="text-2xl font-semibold text-gray-900 dark:text-white">
                            {{ number_format($this->totalClicks) }}</p>
                        <p class="text-xs text-gray-400 dark:text-gray-500">{{ $this->getPeriodDescription() }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 border border-gray-200 dark:border-gray-700">
                <div class="flex items-center">
                    <svg class="h-6 w-6 text-success-500 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path
                            d="M9 2a2 2 0 00-2 2v8a2 2 0 002 2h6a2 2 0 002-2V6.414A2 2 0 0016.414 5L14 2.586A2 2 0 0012.586 2H9z" />
                        <path d="M3 8a2 2 0 012-2v10h8a2 2 0 01-2 2H5a2 2 0 01-2-2V8z" />
                    </svg>
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Unique Pages</p>
                        <p class="text-2xl font-semibold text-gray-900 dark:text-white">
                            {{ number_format($this->uniquePagesCount) }}</p>
                        <p class="text-xs text-gray-400 dark:text-gray-500">Pages with interactions</p>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 border border-gray-200 dark:border-gray-700">
                <div class="flex items-center">
                    <svg class="h-6 w-6 text-warning-500 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z"
                            clip-rule="evenodd" />
                    </svg>
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Unique CTAs</p>
                        <p class="text-2xl font-semibold text-gray-900 dark:text-white">
                            {{ number_format($this->uniqueCtasCount) }}</p>
                        <p class="text-xs text-gray-400 dark:text-gray-500">Different call-to-actions</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tabs for different views --}}
        <div class="border-b border-gray-200 dark:border-gray-700">
            <nav class="-mb-px flex space-x-8 px-4">
                <button wire:click="setActiveTab('pages')" @class([
                    'whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm',
                    'border-primary-500 text-primary-600 dark:text-primary-400' =>
                        $activeTab === 'pages',
                    'border-transparent text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-600' =>
                        $activeTab !== 'pages',
                ])>
                    Pages
                </button>

                <button wire:click="setActiveTab('ctas')" @class([
                    'whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm',
                    'border-primary-500 text-primary-600 dark:text-primary-400' =>
                        $activeTab === 'ctas',
                    'border-transparent text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-600' =>
                        $activeTab !== 'ctas',
                ])>
                    CTAs
                </button>
            </nav>
        </div>

        {{-- Tab Content --}}
        <div class="p-4">
            @if ($activeTab === 'pages')
                <div
                    class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden border border-gray-200 dark:border-gray-700">
                    <div class="px-4 py-3 border-b border-gray-200 dark:border-gray-700 flex items-center">
                        <svg class="h-5 w-5 mr-2 text-primary-500" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path
                                d="M9 2a2 2 0 00-2 2v8a2 2 0 002 2h6a2 2 0 002-2V6.414A2 2 0 0016.414 5L14 2.586A2 2 0 0012.586 2H9z" />
                            <path d="M3 8a2 2 0 012-2v10h8a2 2 0 01-2 2H5a2 2 0 01-2-2V8z" />
                        </svg>
                        <h3 class="font-medium text-gray-900 dark:text-white">Clicks by Page</h3>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        Page
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        Clicks
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        %
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse ($this->clicksByPage as $row)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                            {{ Str::limit($row['page'], 50) }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400 text-right">
                                            {{ number_format($row['clicks']) }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-right {{ $row['percentage'] > 20 ? 'text-success-600 dark:text-success-400' : 'text-warning-600 dark:text-warning-400' }}">
                                            {{ $row['percentage'] }}%
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3"
                                            class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                                            No page click data available
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <div
                    class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden border border-gray-200 dark:border-gray-700">
                    <div class="px-4 py-3 border-b border-gray-200 dark:border-gray-700 flex items-center">
                        <svg class="h-5 w-5 mr-2 text-primary-500" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z"
                                clip-rule="evenodd" />
                        </svg>
                        <h3 class="font-medium text-gray-900 dark:text-white">Clicks by Call-to-Action</h3>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        CTA
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        Clicks
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        %
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse ($this->clicksByCta as $row)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                            {{ $row['cta'] }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400 text-right">
                                            {{ number_format($row['clicks']) }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-right {{ $row['percentage'] > 20 ? 'text-success-600 dark:text-success-400' : 'text-warning-600 dark:text-warning-400' }}">
                                            {{ $row['percentage'] }}%
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3"
                                            class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                                            No CTA click data available
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-filament-widgets::widget>
