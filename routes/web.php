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

Route::get('/packages.json', 'PageController@composer_packages')->name('composer_packages');
Route::get('/portfolio', 'PageController@portfolio')->name('portfolio');
Route::get('/quotes', 'PageController@quotes')->name('quotes');
Route::get('/resume', 'PageController@resume')->name('resume');
Route::get('/', 'PageController@home')->name('home');

Route::get('login', 'Auth\LoginController@redirectToProvider')->name('login');
Route::get('login/callback', 'Auth\LoginController@handleProviderCallback')->name('login.callback');

Route::group(['middleware' => ['recaptcha']], function() {
    Route::resource('/contact', 'ContactMessageController')->only(['store']);
});

Route::group(['middleware' => ['auth.custom']], function() {

    Route::any('logout', 'Auth\LogoutController@handleLogout')->name('logout');

    Route::prefix('admin')->group(function() {

        Route::namespace('Admin')->prefix("manage")->name('admin.manage.')->group(function() {
            Route::resource('resume', 'ResumeController');
            Route::resource('reminder', 'ReminderController');
            Route::put('quotes/activate', 'QuotesController@activate')->name('quotes.activate');
            Route::resource('drinks', 'DrinksController');
            Route::resource('quotes', 'QuotesController');
            Route::resource('portfolio', 'PortfolioController');
            Route::resource('contact', 'ContactMessageController', ['parameters' => ['contact' => 'message']])->only(['index', 'show', 'destroy']);
            Route::namespace('Composer')->prefix("composer")->name('composer.')->group(function() {
                Route::get('/', 'MainController@index')->name('index');
                Route::resource('packages', 'PackageController')->except(['index']);
            });
        });

        Voyager::routes();

    });

    Route::namespace('Food')->prefix('food')->group(function() {
        Route::get('/', 'SearchController@index')->name('food.search');
        Route::resource('restaurants', 'RestaurantController');
        Route::resource('restaurants/{restaurantId}/orders', 'OrderController');
    });
});

Route::prefix('blog')->group(function () {
    Route::get('/', 'BlogController@getPosts')->name('blog.index');
    Route::middleware('Canvas\Http\Middleware\ViewThrottle')->get('{slug}', 'BlogController@findPostBySlug')->name('blog.post');
    Route::get('tag/{slug}', 'BlogController@getPostsByTag')->name('blog.tag');
    Route::get('topic/{slug}', 'BlogController@getPostsByTopic')->name('blog.topic');
});
