<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Credit;

class CreditSyihab extends Component
{
    public function render()
    {
        $credits = Credit::all();
        return view('livewire.credit-syihab', compact('credits'));
    }
}
