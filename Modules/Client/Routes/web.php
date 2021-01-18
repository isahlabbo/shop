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
        Route::get('/registration/{refferal?}', 'RegistrationController@index')->name('registration');
        Route::post('/register', 'RegistrationController@register')->name('register');
		Route::get('/Authorisation/fail', 'Auth\LoginController@unauthorize')->name('auth.auth');
        
	    
	    Route::post('/login', 'LoginController@login')->name('login');
	    Route::post('logout', 'LoginController@logout')->name('logout');
    });

    // client connection routes
    Route::prefix('/connection')
            ->name('connection.')
            ->group(function() {
            Route::get('/', 'ClientConnectionController@index')->name('index');
            Route::get('/create/{referralCode}', 'ClientConnectionController@create')->name('create');
            Route::post('/register/{referralCode}', 'ClientConnectionController@register')->name('register');
    });

    Route::prefix('shop')
    ->namespace('Shop')
    ->name('shop.')
    ->group(function() {

        Route::get('/address/{addressId}', 'AddressAvailableShopController@address')->name('address');
        Route::get('/area/{areaId}', 'AddressAvailableShopController@area')->name('area');
        Route::get('/town/{townId}', 'AddressAvailableShopController@town')->name('town');
        Route::get('/local-government/{lgaId}', 'AddressAvailableShopController@lga')->name('lga');
        Route::get('/state/{stateId}', 'AddressAvailableShopController@state')->name('state');

        Route::get('/', 'SearchShopController@index')->name('index');
        Route::get('/create', 'SearchShopController@create')->name('create');
        Route::post('/search', 'SearchShopController@search')->name('search');
        Route::get('/{shopId}/view', 'SearchShopController@view')->name('view');

        Route::prefix('{shopId}/subscription')
            ->name('subscription.')
            ->group(function() {
            Route::get('/', 'ShopSubscriptionController@subscribe')->name('subscribe');
            
        });

        Route::prefix('{shopId}/work')
            ->name('work.')
            ->group(function() {
            Route::get('create', 'ClientShopWorkController@create')->name('create');
            Route::post('/register', 'ClientShopWorkController@register')->name('register');
           
            Route::prefix('{workId}/bargain')
                ->name('bargain.')
                ->group(function() {
                Route::get('/', 'ShopClientWorkBargainController@index')->name('index');  
                Route::post('/send', 'ShopClientWorkBargainController@send')->name('send');  
            });

        });   

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
