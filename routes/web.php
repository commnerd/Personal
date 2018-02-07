<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { return view('home'); })->name('home');
Route::get('/resume', function () { return view('resume'); })->name('resume');

Route::get('login', 'Auth\LoginController@redirectToProvider')->name('login');
Route::get('login/callback', 'Auth\LoginController@handleProviderCallback');

Route::group(['middleware' => ['auth.custom']], function() {
    Route::get('/admin', function() {
        return view('admin.index');
    })->name('admin');
    Route::get('logout', 'Auth\LogoutController@handleLogout')->name('logout');
    Route::namespace('Admin')->prefix('admin')->group(function() {
        Route::resource('/resume', 'ResumeController');
        Route::resource('/portfolio', 'PortfolioController');
    });

    Route::namespace('Food')->prefix('food')->group(function() {
        Route::resource('/restaurants/{restaurantId}/orders', 'OrderController');
        Route::resource('/restaurants', 'RestaurantController');
    });
});
