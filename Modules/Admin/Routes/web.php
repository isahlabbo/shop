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

Route::prefix('admin')
->name('admin.')
->group(function() {
    Route::get('/dashboard', 'AdminController@index')->name('dashboard');
    
    Route::namespace('Auth')
    ->group(function() {
        Route::get('/login', 'AdminLoginController@index')->name('login');
        Route::get('/registration', 'AdminRegistrationController@index')->name('registration');
        Route::post('/register', 'AdminRegistrationController@register')->name('register');
	    Route::post('/login', 'AdminLoginController@login')->name('login');
	    Route::post('logout', 'AdminLoginController@logout')->name('logout');
    });

    Route::name('shop.')
    ->prefix('shop')
    ->namespace('Shop')
    ->group(function() {
        Route::get('/create', 'ShopController@create')->name('create');
        Route::post('/registration', 'ShopController@registration')->name('registration');
        // shop apparentes routes
        Route::name('apparent.')
        ->prefix('{shopId}/apparentes')
        ->group(function() {
            Route::get('/', 'ApparentController@index')->name('index');
            Route::get('/create', 'ApparentController@create')->name('create');
            Route::post('/register', 'ApparentController@register')->name('register');
        });
        //shop programmes routes
        Route::name('programme.')
        ->prefix('{shopId}/programmes')
        ->group(function() {
            Route::get('/', 'ProgrammeController@index')->name('index');
            Route::get('/create', 'ProgrammeController@create')->name('create');
            Route::post('/register', 'ProgrammeController@register')->name('register');
        });
    });
});
