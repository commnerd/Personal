<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:api')->name('api.')->group(function() {
    Route::get('/site_stats', [\App\Http\Controllers\Api\SiteStatsController::class, 'index'])->name('site_states');
    Route::apiResource('/drinks', \App\Http\Controllers\Api\DrinksController::class);
    Route::apiResource('/quotes', \App\Http\Controllers\Api\QuotesController::class);
    Route::apiResource('/messages', \App\Http\Controllers\Api\MessagesController::class);
    Route::prefix('food')->name('food.')->group(function() {
        Route::resource('/restaurants', \App\Http\Controllers\Api\Food\RestaurantsController::class);
        Route::resource('/orders', \App\Http\Controllers\Api\Food\OrdersController::class);
    });
    Route::prefix('blog')->name('blog.')->group(function() {
        Route::resource('/posts', \App\Http\Controllers\Api\Blog\PostsController::class);
    });
});

Route::get('/login/callback', [\App\Http\Controllers\Api\AuthController::class, 'callback']);
Route::get('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);