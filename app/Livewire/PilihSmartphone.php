<?php

namespace App\Livewire;

use Livewire\Component;

class PilihSmartphone extends Component
{
    public $selectedCategory = null;

    public function selectCategory($category)
    {
        $this->selectedCategory = $category;
    }
    
    public function render()
    {
        return view('livewire.pilih-smartphone');
    }
}
