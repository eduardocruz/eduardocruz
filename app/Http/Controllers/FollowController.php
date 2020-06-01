<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        //$this->middleware('subscribed');

        // $this->middleware('verified');
    }

    public function follow(User $user)
    {
        if(auth()->user()->isFollowing($user))
            return redirect('/users/'.$user->id)->with('status', 'Already following user!');
        auth()->user()->follow($user);
        return redirect('/users/'.$user->id)->with('status', 'User followed!');
    }

    public function unfollow(User $user)
    {
        if(!auth()->user()->isFollowing($user))
            return redirect('/users/'.$user->id)->with('status', 'Not following user!');

        auth()->user()->unfollow($user);
        return redirect('/users/'.$user->id)->with('status', 'User unfollowed!');
    }
}
