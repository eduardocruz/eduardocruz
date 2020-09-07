<?php

namespace App\Http\Livewire\Home;

use App\Models\Level;
use Livewire\Component;

class Levels extends Component
{

    public $levels = [];

    public function render()
    {
        $this->levels = Level::orderBy('id', 'desc')->get();
        return view('livewire.home.levels');
    }
}
