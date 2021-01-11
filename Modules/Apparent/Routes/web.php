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

Route::
    prefix('apparent')
    ->name('apparent.')
    ->group(function() {
    Route::get('/dashboard', 'ApparentController@index')->name('dashboard');
    Route::namespace('Auth')
    ->group(function() {
        Route::get('/login', 'ApparentLoginController@index')->name('login');
        Route::get('/registration', 'ApparentRegistrationController@index')->name('registration');
        Route::post('/register', 'ApparentRegistrationController@register')->name('register');
	    Route::post('/login', 'ApparentLoginController@login')->name('login');
	    Route::post('logout', 'ApparentLoginController@logout')->name('logout');
    });
    Route::
    prefix('class')
    ->name('class.')
    ->group(function() {
        Route::get('/{classId}/time-table', 'TimeTableController@index')->name('timeTable');
    });
});
    