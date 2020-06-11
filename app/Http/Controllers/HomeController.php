<?php

namespace App\Http\Controllers;

use App\Models\Checkin;
use App\Models\Interaction;
use App\Models\Technology;
use App\Models\Video;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return Response
     */
    public function show()
    {
        $video_count = Video::whereNotNull('video_url')->count();
        $video_minutes = Video::whereNotNull('video_url')->sum('duration');

        //$technologies = Technology::orderBy('created_at', 'desc')->get();
        $technologies = Technology::with('checkins')->distinct()->get()->sortByDesc(function($technology)
        {
            return $technology->checkins->count();
        });

        $interactions = Interaction::orderBy('created_at', 'desc')->get()->take(11);;
        $checkins = Checkin::orderBy('created_at', 'desc')->get()->take(11);

        $users = User::with('checkins')->distinct()->get()->sortByDesc(function($user)
        {
            return $user->checkins->count();
        });

        $videos = Video::whereNotNull('video_url')->orderBy('created_at', 'desc')->get()->take(6);

        return view('home', compact(
            'users',
            'video_count',
            'video_minutes',
            'interactions',
            'technologies',
            'checkins',
            'videos'
        ));
    }


    public function connect()
    {
        return view('connect');
    }


    public function connected(Request $request)
    {
        Log::info('Stripe Connnect Result');
        Log::info(auth()->user());
        Log::info($request);

        if($request->has('error'))
        {
            // The user was redirect back from the OAuth form with an error.
            $error =$request->error;
            $error_description = $request->error_description;
            return view('connected', compact('error', 'error_description'));
        }

        if($request->has('code'))
        {
            try {

                \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

                $response = \Stripe\OAuth::token([
                    'grant_type' => 'authorization_code',
                    'code' => $request->code,

                ]);
                // Access the connected account id in the response
                $connected_account_id = $response->stripe_user_id;

                Log::info($connected_account_id);
                $message = 'Connected';
                return view('connected', compact('message'));

            } catch (\Stripe\Exception\OAuth\OAuthErrorException $e) {
                $message = $e->getMessage();
                return view('connected', compact('message'));
            }

        }
    }
}
