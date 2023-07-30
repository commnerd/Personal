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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth')->group(function() {
    Route::get('system', [\App\Http\Controllers\Api\SystemController::class, 'index']);
});

Route::get('site_stats', [\App\Http\Controllers\Api\SiteStatsController::class, 'index']);

Route::get('login/callback', [\App\Http\Controllers\Api\AuthController::class, 'callback']);
Route::get('login', [\App\Http\Controllers\Api\AuthController::class, 'login']);