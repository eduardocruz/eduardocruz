<?php

namespace App\Http\Controllers;

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

    public function inscricoes()
    {
        $users = User::orderBy('id', 'asc')->get();
        return view('inscricoes', compact('users'));
    }
}
