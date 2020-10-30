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
            Route::get('/application', 'ApparentController@application')->name('application');
            Route::post('/register', 'ApparentController@register')->name('register');
        });

        // shop customers routes
        Route::name('customer.')
        ->prefix('{shopId}/customers')
        ->group(function() {
            Route::get('/', 'CustomerController@index')->name('index');
            Route::get('/create', 'CustomerController@create')->name('create');
            Route::post('/register', 'CustomerController@register')->name('register');
            
            // shop customers works routes
            Route::name('work.')
            ->prefix('{clientId}/works')
            ->group(function() {
                Route::get('/', 'CustomerWorkController@index')->name('index');
                Route::get('/create', 'CustomerWorkController@create')->name('create');
                Route::get('/done', 'CustomerWorkController@done')->name('done');
                Route::post('/register', 'CustomerWorkController@register')->name('register');
            });

            // shop customers family routes
            Route::name('family.member.')
            ->prefix('{clientId}/family-member')
            ->group(function() {
                Route::get('/', 'CustomerFamilyMemberController@index')->name('index');
                Route::get('/create', 'CustomerFamilyMemberController@create')->name('create');
                
            });

           

            // shop customers measurment routes
            Route::name('measurement.')
            ->prefix('{clientId}/measurement')
            ->group(function() {
                Route::get('/', 'CustomerMeasurementController@index')->name('index');
                Route::post('/update', 'CustomerMeasurementController@update')->name('update');
            });
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
