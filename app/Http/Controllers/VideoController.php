<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Laravel\Spark\Spark;

class VideoController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unlockedVideos = Video::whereNotNull('video_url')->orderBy('created_at', 'desc')->get();
        $lockedVideos = Video::whereNull('video_url')->orderBy('created_at', 'desc')->get();
        $video_count = Video::whereNotNull('video_url')->count();
        $video_minutes = Video::whereNotNull('video_url')->sum('duration');
        return view('videos.index', compact(
            'unlockedVideos', 'lockedVideos',
            'video_count', 'video_minutes'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        if(!isset($video->video_url))
        {
            return abort(403);
        }


        if(Spark::usesTeams() && !auth()->user()->hasTeams() && $video->created_at > '2020-04-17 00:00:00')
        {
            return abort(403);
        }


        if(in_array($video->id, [79, 80]))
        {
            if(auth()->user()->subscriptions()->where('stripe_status', 'active')->where('stripe_plan', 'price_1J9znf48gdCLm2TzuVUq6xRC')->count() < 1)
            {
                abort(403, 'Acesso restrito a alunos do plano anual');
            }
        }

        return view('videos.show', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        //
    }

    public function devOps()
    {
        $unlockedVideos = Video::whereIn('id', [34, 41, 51, 60])->get();
        $sectionName = 'DevOps';
        return view('videos.section', compact('unlockedVideos', 'sectionName'));
    }

    public function handsOn()
    {
        $unlockedVideos = Video::whereIn('id', [71])->get();
        $sectionName = 'Hands-on';
        return view('videos.section', compact('unlockedVideos', 'sectionName'));
    }

    public function anual()
    {
        if(auth()->user()->subscriptions()->where('stripe_status', 'active')->where('stripe_plan', 'price_1J9znf48gdCLm2TzuVUq6xRC')->count() < 1)
        {
            abort(403, 'Acesso restrito a alunos do plano anual');
        }
        $unlockedVideos = Video::whereIn('id', [78, 79, 80])->orderBy('id', 'asc')->get();
        $sectionName = 'Anual';

        return view('videos.section', compact('unlockedVideos', 'sectionName'));
    }
}
