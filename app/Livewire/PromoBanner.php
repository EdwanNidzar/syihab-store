<?php

namespace App\Livewire;

use Livewire\Component;

class PromoBanner extends Component
{
    public function lihatProduk()
    {
        return redirect()->route('products');
    }

    public function tukarSekarang()
    {
        return redirect()->away('https://tukartambah.gskstore.id/');
    }

    public function render()
    {
        return view('livewire.promo-banner');
    }
}