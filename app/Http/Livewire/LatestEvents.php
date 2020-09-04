<?php

namespace App\Http\Livewire;

use App\Models\Interaction;
use Livewire\Component;

class LatestEvents extends Component
{
    public function render()
    {
        $interactions = Interaction::orderBy('created_at', 'desc')->get()->take(11);;
        return view('livewire.latest-events', [
            'interactions' => $interactions,
        ]);
    }
}
