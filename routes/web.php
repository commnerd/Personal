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
Route::get('resume', [\App\Http\Controllers\Web\ResumeController::class, 'index'])->name('web.resume');
Route::get('food', [\App\Http\Controllers\Web\FoodController::class, 'index'])->name('web.food');
Route::get('food/{order}', [\App\Http\Controllers\Web\FoodController::class, 'order'])->name('web.food.order');
Route::get('{admin}', function (string $admin) {
    return view('admin');
})->where('admin', '.*')->name('admin');
