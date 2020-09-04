<?php

namespace App\Http\Livewire\Home;

use App\Models\Interaction;
use Livewire\Component;

class LatestEvents extends Component
{

    public $interactions;

    public function render()
    {
        $this->interactions = Interaction::orderBy('created_at', 'desc')->get()->take(11);;
        return view('livewire.home.latest-events');
    }
}
