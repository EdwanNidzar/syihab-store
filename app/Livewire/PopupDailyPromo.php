<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\DailyPromo;

class PopupDailyPromo extends Component
{
    public $dailyPromo;

    public function mount()
    {
        $this->dailyPromo = DailyPromo::where('is_popups', true)->inRandomOrder()->first();
    }

    public function render()
    {
        return view('livewire.popup-daily-promo');
    }
}
