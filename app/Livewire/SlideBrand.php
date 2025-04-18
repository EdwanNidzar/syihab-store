<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Brand;

class SlideBrand extends Component
{
    public function render()
    {
        // Fetch the brands from the database
        $brands = Brand::all();
        return view('livewire.slide-brand', [
            'brands' => $brands
        ]);
    }
}
