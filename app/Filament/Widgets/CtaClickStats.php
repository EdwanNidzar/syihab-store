<?php

namespace App\Filament\Widgets;

use App\Models\ClickTracking;
use Filament\Widgets\Widget;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CtaClickStats extends Widget
{
    protected static string $view = 'filament.widgets.cta-click-stats';
    protected int|string|array $columnSpan = 'full';

    public $from;
    public $to;
    public $activeTab = 'pages';

    public function mount(): void
    {
        $this->from = now()->subDays(30)->toDateString();
        $this->to = now()->toDateString();
    }

    // Add this method to handle tab switching
    public function setActiveTab(string $tab): void
    {
        $this->activeTab = $tab;
    }

    public function updateFilters(): void
    {
        // This will trigger a refresh of the data
    }

    public function resetFilters(): void
    {
        $this->from = now()->subDays(30)->toDateString();
        $this->to = now()->toDateString();
    }

    public function getTotalClicksProperty(): int
    {
        return $this->getBaseQuery()->sum('clicks');
    }

    public function getClicksByPageProperty(): Collection
    {
        $total = max($this->totalClicks, 1);

        return $this->getBaseQuery()
            ->select('page', DB::raw('SUM(clicks) as total_clicks'))
            ->groupBy('page')
            ->orderByDesc('total_clicks')
            ->get()
            ->map(function ($item) use ($total) {
                return [
                    'page' => $item->page,
                    'clicks' => $item->total_clicks,
                    'percentage' => round(($item->total_clicks / $total) * 100, 1),
                ];
            });
    }

    public function getClicksByCtaProperty(): Collection
    {
        $total = max($this->totalClicks, 1);

        return $this->getBaseQuery()
            ->select('cta_name as cta', DB::raw('SUM(clicks) as total_clicks'))
            ->groupBy('cta_name')
            ->orderByDesc('total_clicks')
            ->get()
            ->map(function ($item) use ($total) {
                return [
                    'cta' => $item->cta ?: 'Unknown',
                    'clicks' => $item->total_clicks,
                    'percentage' => round(($item->total_clicks / $total) * 100, 1),
                ];
            });
    }

    public function getUniquePagesCountProperty(): int
    {
        return $this->getBaseQuery()
            ->distinct('page')
            ->count('page');
    }

    public function getUniqueCtasCountProperty(): int
    {
        return $this->getBaseQuery()
            ->distinct('cta_name')
            ->count('cta_name');
    }

    public function getPeriodDescription(): string
    {
        if (!$this->from && !$this->to) {
            return 'All time';
        }

        $from = Carbon::parse($this->from)->format('M d, Y');
        $to = Carbon::parse($this->to)->format('M d, Y');

        return "{$from} to {$to}";
    }

    protected function getBaseQuery()
    {
        return ClickTracking::query()
            ->when($this->from, fn ($q) => $q->whereDate('created_at', '>=', $this->from))
            ->when($this->to, fn ($q) => $q->whereDate('created_at', '<=', $this->to));
    }
}