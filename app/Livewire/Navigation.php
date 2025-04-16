<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class Navigation extends Component
{
    public $search = '';
    public $results = [];

    protected $queryString = ['search'];

    public function updatedSearch($value)
    {
        $this->results = $value ? Product::where('name', 'like', '%'.$value.'%')
            ->take(5)
            ->get() : [];
    }

    public function render()
    {
        return view('livewire.navigation');
    }
}
