<?php

use App\Http\Controllers\Api\V1\QuoteController;
use Illuminate\Support\Facades\Route;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace("Api/V1")->name('api.v1.')->prefix('/v1')->group(function() {
    Route::get('/quotes', [QuoteController::class, 'index'])->name('quotes.index');
});
