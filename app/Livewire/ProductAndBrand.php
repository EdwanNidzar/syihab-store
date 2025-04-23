<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Brand;

class ProductAndBrand extends Component
{
    public function render()
    {
        $produkTerbaru = Product::where('is_active', true)->latest()->get();

        $merekAktif = Brand::where('is_active', true)->get();

        return view('livewire.product-and-brand', [
            'produkTerbaru' => $produkTerbaru,
            'merekAktif' => $merekAktif,
        ]);
    }
}
