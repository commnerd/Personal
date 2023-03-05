<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::name('api.')->namespace('\\App\\Http\\Controllers\\Api')->group(function() {
    Route::name('v1.')->namespace('V1')->prefix('v1')->group(function() {
        Route::post('login', 'AuthenticationController@login')->name('login');
        // Route::middleware('github.auth')->post('/github_event', 'GithubController@execute')->name('github.auth');
        Route::get('logout', 'AuthenticationController@logout')->name('logout');
        Route::middleware('scope:manage-restaurants,search-orders')->group(function() {
            Route::namespace('Food')->prefix('food')->group(function() {
                Route::get('/search', 'FoodController@search')->middleware('scope:search-orders')->name('food.search');
                Route::resource('/restaurants', 'RestaurantController')->except(['create', 'edit']);
                Route::resource('/restaurants/{restaurantId}/orders', 'OrderController')->except(['create', 'edit']);
            });
        });

        Route::resource('/reminders', 'ReminderController')->only(['index', 'show']);
        Route::resource('/quotes', 'QuoteController')->only(['index', 'show']);
    });

    Route::namespace('V2')->group(function() {
        foreach(['', 'v2'] as $index => $version) {
            Route::name(!empty($version) ? "$version." : '')->prefix($version)->group(function() {
                Route::get('/system-spec', 'SystemSpec@index')->name('system-spec.index');
                Route::namespace('Composer')->name('composer.')->prefix('composer')->group(function() {
                    Route::apiResources([
                        'packages' => 'Packages',
                        'package-sources' => 'PackageSources',
                    ]);
                });
                Route::apiResources([
                    '/contact-messages' => 'ContactMessages',
                    '/drinks' => 'Drinks',
                    '/quotes' => 'Quotes',
                ]);
            });
        }
    });
});