<?php

// app/Livewire/Components/DailyPromo.php
namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\DailyPromo as Promo;


class DailyPromo extends Component
{
    public function render()
    {
        $promos = Promo::where('is_active', true)->orderBy('created_at', 'desc')->get();
        return view('livewire.components.daily-promo', compact('promos'));
    }
}