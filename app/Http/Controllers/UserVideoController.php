<?php

namespace App\Http\Controllers;

use App\Models\UserVideo;
use App\Models\Video;
use Illuminate\Http\Request;

class UserVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserVideo  $userVideo
     * @return \Illuminate\Http\Response
     */
    public function show(UserVideo $userVideo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserVideo  $userVideo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserVideo $userVideo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserVideo  $userVideo
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserVideo $userVideo)
    {
        //
    }

    public function toggleWatched(Video $video)
    {
        auth()->user()->videos()->toggle($video->id);
        return redirect()->back()->with('status', 'Status da aula alterado');
    }
}
