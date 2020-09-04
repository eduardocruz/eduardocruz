<?php

namespace App\Http\Livewire;

use App\Models\Technology;
use Livewire\Component;

class TechnologyList extends Component
{
    public function render()
    {
        //$technologies = Technology::orderBy('created_at', 'desc')->get();
        $technologies = Technology::with('checkins')->distinct()->get()->sortByDesc(function($technology)
        {
            return $technology->checkins->count();
        })->take(5);
        return view('livewire.technology-list', [
            'technologies' => $technologies
        ]);
    }
}
