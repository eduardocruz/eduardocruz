<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register the API routes for your application as
| the routes are automatically authenticated using the API guard and
| loaded automatically by this application's RouteServiceProvider.
|
*/

use App\Models\Checkin;
use Carbon\Carbon;

Route::group([
    'middleware' => 'auth:api'
], function () {
    Route::get('me', function(){
       return auth()->user();
    });
    Route::get('technologies/{technology_id}', function($technology_id){
        $technology = \App\Models\Technology::findOrFail($technology_id);
        try {
            $checkin = Checkin::firstOrCreate([
                'user_id' => auth()->user()->id,
                'technology_id' => $technology->id,
                'checkin_at' => Carbon::now()
            ]);

            if($checkin->wasRecentlyCreated)
                return redirect('/technologies/'.$technology->id)->with('status', 'Checkin created');
        } catch (\Exception $exception)
        {
            if($exception->getCode() == 23000)
                return redirect('/technologies/'.$technology->id)->with('status', 'You had a previous checkin today');
        }
    });
});
