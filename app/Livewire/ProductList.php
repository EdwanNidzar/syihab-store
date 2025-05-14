<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductList extends Component
{
    public function render()
    {
        $products = Product::where('is_active', true)->latest()->take(16)->get();
        return view('livewire.product-list', compact('products'));
    }
}
