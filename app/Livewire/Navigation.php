<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Navigation extends Component
{
    public $search = '';
    public $productResults = [];
    public $brandResults = [];
    public $showDropdown = false;

    public function updatedSearch($value)
    {
        if (strlen($value) >= 2) {
            $this->productResults = Product::where('name', 'like', '%'.$value.'%')
                ->where('is_active', true)
                ->take(5)
                ->get();
                
            $this->brandResults = Brand::where('name', 'like', '%'.$value.'%')
                ->where('is_active', true)
                ->take(3)
                ->get();
                
            $this->showDropdown = true;
        } else {
            $this->reset(['productResults', 'brandResults', 'showDropdown']);
        }
    }

    public function selectProduct($slug)
    {
        $this->resetSearch();
        return redirect()->route('product-detail', ['slug' => $slug]);
    }

    public function selectBrand($slug)
    {
        $this->resetSearch();
        return redirect()->route('brand-detail', ['slug' => $slug]);
    }

    private function resetSearch()
    {
        $this->reset(['search', 'productResults', 'brandResults', 'showDropdown']);
    }

    public function render()
    {
        $brands = Brand::where('is_active', true)->get();
        return view('livewire.navigation', compact('brands'));
    }
}