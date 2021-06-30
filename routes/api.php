<?php

use App\Http\Controllers\Api\V1\Food\FoodController;
use App\Http\Controllers\Api\V1\ReminderController;
use App\Http\Controllers\Api\V1\QuoteController;
use Illuminate\Support\Facades\Route;

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
    Route::name('v1.')->prefix('v1')->group(function() {
//         Route::post('login', 'AuthenticationController@login')->name('login');
//         Route::middleware('github.auth')->post('/github_event', 'GithubController@execute')->name('github.auth');
//        Route::get('logout', 'AuthenticationController@logout')->name('logout');
//        Route::middleware('scope:manage-restaurants,search-orders')->group(function() {
            Route::namespace('Food')->prefix('food')->group(function() {
                Route::get('/search', [FoodController::class, 'search'])->middleware('scope:search-orders')->name('food.search');
//                Route::resource('/restaurants', 'RestaurantController')->except(['create', 'edit']);
//                Route::resource('/restaurants/{restaurantId}/orders', 'OrderController')->except(['create', 'edit']);
            });
//        });

        Route::resource('/reminders', ReminderController::class)->only(['index', 'show']);
        Route::resource('/quotes', QuoteController::class)->only(['index', 'show']);
    });
});
