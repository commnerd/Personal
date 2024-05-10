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
    Route::get('/site_stats', [\App\Http\Controllers\Api\SiteStatsController::class, 'index'])->name('site_stats');
    Route::apiResource('/daily-reminders', \App\Http\Controllers\Api\DailyReminderController::class);
    Route::apiResource('/drinks', \App\Http\Controllers\Api\DrinksController::class);
    Route::apiResource('/quotes', \App\Http\Controllers\Api\QuotesController::class);
    Route::apiResource('/contact-messages', \App\Http\Controllers\Api\ContactMessagesController::class);
    Route::prefix('composer')->name('composer.')->group(function() {
        Route::apiResource('/packages', \App\Http\Controllers\Api\Composer\PackagesController::class);
        Route::apiResource('/package_sources', \App\Http\Controllers\Api\Composer\PackageSourcesController::class);
    });
    Route::prefix('food')->name('food.')->group(function() {
        Route::apiResource('/restaurants', \App\Http\Controllers\Api\Food\RestaurantsController::class);
        Route::apiResource('/orders', \App\Http\Controllers\Api\Food\OrdersController::class);
    });
    Route::prefix('blog')->name('blog.')->group(function() {
        Route::apiResource('/posts', \App\Http\Controllers\Api\Blog\PostsController::class);
    });
    Route::prefix('work')->name('work.')->group(function() {
        Route::apiResource('/employment-records', \App\Http\Controllers\Api\Work\EmploymentRecordsController::class);
        Route::apiResource('/portfolio-entries', \App\Http\Controllers\Api\Work\PortfolioEntryController::class);
    });
});

Route::get('/login/callback', [\App\Http\Controllers\Api\AuthController::class, 'callback'])->name('api.login.callback');
Route::get('/login', [\App\Http\Controllers\Api\AuthController::class, 'login'])->name('api.login');
