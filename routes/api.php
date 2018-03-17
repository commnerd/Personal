<?php

use App\Listeners\GithubEventListener;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::name('api.')->group(function() {
    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    })->name('user');

    Route::middleware('github.auth')->post('/github_event', function(Request $request) {
        event(new \App\Events\GithubEvent($request->all()));
        return response()->json(['status' => 'Success']);
    })->name('github.auth');


    Route::namespace('Api')->group(function() {
        Route::namespace('Food')->prefix('food')->group( function() {
            Route::get('/search', 'FoodController@search')->name('food.search');
        });

        Route::resource('/daily_reminder', 'DailyReminderController')->only(['index']);
    });
});
