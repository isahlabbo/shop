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

Route::prefix('client')
    ->name('client.')
    ->group(function() {
    Route::get('/dashboard', 'ClientController@index')->name('dashboard');
    Route::get('/', 'ClientController@verify')->name('verify');

    // client authentication routes
    Route::namespace('Auth')
    ->group(function() {
        Route::get('/login', 'LoginController@index')->name('login');
        Route::get('/registration', 'RegistrationController@index')->name('registration');
        Route::post('/register', 'RegistrationController@register')->name('register');
		Route::get('/Authorisation/fail', 'Auth\LoginController@unauthorize')->name('auth.auth');
        
	    
	    Route::post('/login', 'LoginController@login')->name('login');
	    Route::post('logout', 'LoginController@logout')->name('logout');
    });

    Route::prefix('shop')
    ->namespace('Shop')
    ->name('shop.')
    ->group(function() {
        Route::get('/', 'SearchShopController@index')->name('index');
        Route::get('/create', 'SearchShopController@create')->name('create');
        Route::post('search', 'SearchShopController@search')->name('search');
        Route::prefix('{shopId}/designs')
            ->name('design.')
            ->group(function() {
            Route::get('/', 'ClientShopDesignController@index')->name('index');
            Route::get('/{designId}/like', 'ClientShopDesignController@like')->name('like');
            Route::get('/{designId}/request', 'ClientShopDesignController@request')->name('request');
            });
    });

    Route::prefix('measurement')
    ->name('measurement.')
    ->group(function() {
       Route::get('/', 'MeasurementController@index')->name('index');
       Route::post('/{clietId}/update', 'MeasurementController@update')->name('update');
    });
});
