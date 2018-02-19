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

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\ContactMessage;

Route::get('/', 'PageController@home')->name('home');
Route::get('/resume', 'PageController@resume')->name('resume');

Route::get('login', 'Auth\LoginController@redirectToProvider')->name('login');
Route::get('login/callback', 'Auth\LoginController@handleProviderCallback');

Route::group(['middleware' => ['recaptcha']], function() {
    Route::resource('/contact', 'ContactMessageController')->only(['store']);
});

Route::group(['middleware' => ['auth.custom']], function() {
    Route::resource('/admin', 'Admin\AdminController')->only(['index']);
    Route::get('logout', 'Auth\LogoutController@handleLogout')->name('logout');
    Route::namespace('Admin')->prefix('admin')->group(function() {
        Route::resource('/resume', 'ResumeController');
        Route::resource('/portfolio', 'PortfolioController');
        Route::resource('/contact', 'ContactMessageController')->only(['index', 'show', 'destroy']);
    });

    Route::namespace('Food')->prefix('food')->group(function() {
        Route::resource('/restaurants/{restaurantId}/orders', 'OrderController');
        Route::resource('/restaurants', 'RestaurantController');
    });
});
