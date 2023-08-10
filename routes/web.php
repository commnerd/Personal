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
Route::get('/', [\App\Http\Controllers\Web\WelcomeController::class, 'index'])->name('welcome');
Route::get('resume', [\App\Http\Controllers\Web\ResumeController::class, 'index'])->name('resume');
Route::get('food', [\App\Http\Controllers\Web\FoodController::class, 'index'])->name('food');
Route::get('{admin}', function (string $admin) {
    return view('admin');
})->where('admin', '.*');
