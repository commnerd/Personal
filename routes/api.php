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
    Route::middleware('github.auth')->post('/github_event', function(Request $request) {
        event(new \App\Events\GithubEvent($request->all()));
        return response()->json(['status' => 'Success']);
    })->name('github.auth');

    Route::namespace('Api')->group(function() {
        Route::post('login', 'AuthenticationController@login')->name('login');

        Route::middleware('jwt.auth')->group(function() {
            Route::get('logout', 'AuthenticationController@logout')->name('logout');
            Route::namespace('Food')->prefix('food')->group( function() {
                Route::get('/search', 'FoodController@search')->name('food.search');
            });
        });

        Route::resource('/daily_reminder', 'DailyReminderController')->only(['index']);
    });
});
