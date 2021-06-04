<?php

namespace App\Http\Controllers;

use App\Models\Checkin;
use App\Models\Technology;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technologies = Technology::all();
        return view('technologies.index', compact('technologies'));
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
     * @param  \App\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function show(Technology $technology)
    {
        /*
        $mainUser = User::join('checkins', 'users.id', 'checkins.user_id')
            ->where('checkins.technology_id', $technology->id)
            ->select(
                'users.id',
                DB::raw('count(checkins.id) as total'
                ))
            ->groupBy('users.id')
            ->orderBy('total', 'desc')
            ->first();
        $topUser = User::find($mainUser->id);
        $topUser->totalCheckins = $mainUser->total;
        */
        //$users = $technology->users()->distinct()->get()->except($topUser->id);
        $users = $technology->users()->distinct()->whereHas('subscriptions', function (Builder $query) {
            $query->whereIn('stripe_status',  ['active', 'trialing']);
        })->get()->sortByDesc(function($user) use ($technology)
        {
            return $user->checkins()->where('technology_id', $technology->id)->count();
        });

        $topUser =  $users->first();

        return view('technologies.show', compact('technology', 'topUser', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function edit(Technology $technology)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Technology $technology)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function destroy(Technology $technology)
    {
        //
    }
}
