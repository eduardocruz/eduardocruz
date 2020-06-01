<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function follow(User $user)
    {
        auth()->user()->follow($user);
        return redirect('/users/'.$user->id)->with('status', 'User followed!');
    }
}
