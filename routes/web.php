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
Route::get('/', [\App\Http\Controllers\Web\WelcomeController::class, 'index'])->name('home');
Route::get('test_page', function () {
    return view('test_page');
});
Route::get('{admin}', function (string $admin) {
    return view('admin');
})->where('admin', '.*');
