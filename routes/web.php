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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('logout', 'Auth\LogoutController@handleLogout');
Route::get('login', 'Auth\LoginController@redirectToProvider');
Route::get('login/callback', 'Auth\LoginController@handleProviderCallback');


Route::resource('/portfolio', 'PortfolioController');

Route::namespace('Food')->prefix('food')->group(function() {
    Route::resource('/restaurants/{restaurantId}/orders', 'OrderController');
    Route::resource('/restaurants', 'RestaurantController');
});
