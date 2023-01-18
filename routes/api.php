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
    Route::namespace('V2')->group(function() {
        foreach(['', 'v2'] as $index => $version) {
            Route::name(!empty($version) ? "$version." : '')->prefix($version)->group(function() {
                Route::apiResources([
                    // '/composer-packages' => 'ComposerPackages',
                    // '/contact-messages' => 'ContactMessages',
                    '/drinks' => 'Drinks',
                    // '/quotes' => 'Quotes',
                ]);
            });
        }
    });
});