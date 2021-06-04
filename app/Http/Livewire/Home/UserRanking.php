<?php

namespace App\Http\Livewire\Home;

use App\Models\Level;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class UserRanking extends Component
{
    public $users;

    public function render()
    {
        $this->users = User::with('checkins')->distinct()->whereHas('subscriptions', function (Builder $query) {
            $query->whereIn('stripe_status',  ['active', 'trialing']);
        })->get()->sortByDesc(function($user)
        {
            return $user->checkins->count();
        });
        return view('livewire.home.user-ranking');
    }
}
