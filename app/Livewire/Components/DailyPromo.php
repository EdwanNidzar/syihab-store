<?php

// app/Livewire/Components/DailyPromo.php
namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\DailyPromo as Promo;


class DailyPromo extends Component
{
    public function render()
    {
        $promos = Promo::all(); // Fetch promos from the database
        return view('livewire.components.daily-promo', compact('promos'));
    }
}