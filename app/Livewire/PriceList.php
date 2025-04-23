<?php

namespace App\Livewire;

use Livewire\Component;

class PriceList extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $pricelists = \App\Models\PricesList::where('slug', $this->slug)->firstOrFail();
        return view('livewire.price-list', compact('pricelists'));
    }
}
