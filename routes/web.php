<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [\App\Http\Controllers\Web\WelcomeController::class, 'index'])->name('web.home');

Route::get('{admin}', function (string $path) {
    $contentType = 'text/html';

    if($path == 'admin' || !file_exists(storage_path("app/$path"))) {
        return response(file_get_contents(storage_path("app/admin/index.html")));
    }

    $extension = pathinfo(storage_path("app/$path"), PATHINFO_EXTENSION);

    switch($extension) {
    case 'js':
        $contentType = 'application/javascript';
        break;
    case 'css':
        $contentType = 'text/css';
        break;
    case 'json':
    case 'map':
        $contentType = 'application/json';
        break;
    case 'ico':
        $contentType = 'image/vnd.microsoft.icon';
        break;    
    }
    return response(file_get_contents(storage_path("app/$path")))->header('Content-Type', $contentType);
})->where('admin', '^admin.*')->name('admin');

Route::get('resume', [\App\Http\Controllers\Web\ResumeController::class, 'index'])->name('web.resume');
Route::get('food', [\App\Http\Controllers\Web\FoodController::class, 'index'])->name('web.food');
Route::get('food/restaurants/{restaurant}', [\App\Http\Controllers\Web\FoodController::class, 'restaurant'])->name('web.food.restaurant');
Route::get('food/orders/{order}', [\App\Http\Controllers\Web\FoodController::class, 'order'])->name('web.food.order');
