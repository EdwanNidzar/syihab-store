<?php

namespace App\Livewire;

use App\Models\Brand;
use Livewire\Component;

class ProductList extends Component
{
    public $perBrand = 4; // Jumlah produk awal per brand
    public $loadedCounts = []; // Menyimpan jumlah produk yang sudah di-load per brand

    public function mount()
    {
        // Inisialisasi semua brand dengan jumlah awal
        $this->loadedCounts = Brand::has('products')
            ->pluck('id')
            ->mapWithKeys(fn ($id) => [$id => $this->perBrand])
            ->toArray();
    }

    public function loadMore($brandId)
    {
        $this->loadedCounts[$brandId] += $this->perBrand; // Tambah 4 produk setiap klik
    }

    public function render()
    {
        $brands = Brand::with(['products' => function($query) {
                $query->where('is_active', true)
                    ->orderByRaw('
                        (SELECT MAX(price) 
                         FROM JSON_TABLE(
                             variations,
                             "$[*]" COLUMNS(
                                 price DECIMAL(10,2) PATH "$.price"
                             )
                         ) as prices
                        ) DESC
                    ');
            }])
            ->has('products')
            ->get();

        return view('livewire.product-list', [
            'brands' => $brands,
            'loadedCounts' => $this->loadedCounts
        ]);
    }
}
