<?php

namespace App\Http\Livewire\Home;

use App\Models\Checkin;
use Livewire\Component;

class LatestCheckins extends Component
{

    public $checkins;
    public function render()
    {
        $this->checkins = Checkin::orderBy('created_at', 'desc')->get()->take(11);
        return view('livewire.home.latest-checkins');
    }
}
