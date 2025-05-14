<?php

namespace App\Livewire;

use Livewire\Component;

class BrandList extends Component
{
    public function render()
    {
        $brands = \App\Models\Brand::all();

        $priceVariants = [['label' => '1 Jutaan', 'min' => 1000000, 'max' => 1999999], ['label' => '2 Jutaan', 'min' => 2000000, 'max' => 2999999], ['label' => '3 Jutaan', 'min' => 3000000, 'max' => 3999999], ['label' => '4 Jutaan', 'min' => 4000000, 'max' => 4999999], ['label' => '5 Jutaan', 'min' => 5000000, 'max' => 5999999], ['label' => 'Entry Level', 'min' => 0, 'max' => 1999999], ['label' => 'Midrange', 'min' => 2000000, 'max' => 4999999], ['label' => 'Flagship', 'min' => 5000000, 'max' => 100000000]];

        return view('livewire.brand-list', compact('brands', 'priceVariants'));
    }
}
