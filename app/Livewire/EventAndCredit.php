<?php

namespace App\Livewire;

use Livewire\Component;

class EventAndCredit extends Component
{
    public function events()
    {
        return redirect()->route('events');
    }

    public function credits()
    {
        //
    }

    public function render()
    {
        return view('livewire.event-and-credit');
    }
}
