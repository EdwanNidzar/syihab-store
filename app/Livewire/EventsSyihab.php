<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Event;

class EventsSyihab extends Component
{
    public function render()
    {
        $events = Event::all();
      
        return view('livewire.events-syihab', compact('events'));
    }
}
