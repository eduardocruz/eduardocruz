<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;

class UserRanking extends Component
{
    public $users;

    public function render()
    {
        $this->users = User::with('checkins')->distinct()->get()->sortByDesc(function($user)
        {
            return $user->checkins->count();
        });
        return view('livewire.user-ranking');
    }
}
