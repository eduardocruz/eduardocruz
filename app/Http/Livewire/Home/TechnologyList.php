<?php

namespace App\Http\Livewire\Home;

use App\Models\Technology;
use Livewire\Component;

class TechnologyList extends Component
{

    public $technologies;

    public function render()
    {
        $this->technologies = Technology::with('checkins')->distinct()->get()->sortByDesc(function($technology)
        {
            return $technology->checkins->count();
        })->take(5);
        return view('livewire.home.technology-list');
    }
}
