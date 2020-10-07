<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\User;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Show the application splash screen.
     *
     * @return Response
     */
    public function show()
    {
        return view('welcome');
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function inscricoes()
    {
        $users = User::orderBy('id', 'asc')->get();
        $video_minutes = Video::whereNotNull('video_url')->sum('duration');
        $video_count = Video::whereNotNull('video_url')->count();
        return view('inscricoes', compact('users', 'video_minutes', 'video_count'));
    }
}
