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
    Route::get('/', 'ClientController@index');
    // client authentication routes
    Route::namespace('Auth')
    ->group(function() {
        Route::get('/login', 'LoginController@index')->name('login');
        Route::get('/registration', 'RegistrationController@index')->name('registration');
        Route::post('/register', 'RegistrationController@register')->name('register');
    });
});
