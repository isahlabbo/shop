<?php

use Illuminate\Support\Facades\Route;

use Modules\Admin\Entities\Shop;
use Modules\Client\Entities\Client;
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
    return view('welcome',[
    	'shops'=>Shop::cursor(),
    	'clients'=>Client::cursor(),
    ]);
});

Auth::routes();
    Route::namespace('Shop')
	    ->name('shop.')
	    ->group(function() {
            Route::get('/{shop}', 'ShopController@index')->name('index');
    });

    Route::prefix('ajax')
	   ->namespace('Ajax')
	   ->name('ajax')
	   ->group(function() {
        //address ajax routes
	    Route::prefix('address')
		   ->name('address')
		   ->group(function() {
	        Route::get('/state/{stateId}/get-lgas', 'AddressController@getLgas');
	        Route::get('/lga/{lgaId}/get-towns', 'AddressController@getTowns');
	        Route::get('/town/{townId}/get-areas', 'AddressController@getAreas');
	        Route::get('/area/{townId}/get-addresses', 'AddressController@getAddresses');
        });
        Route::prefix('programme')
		   ->name('programme')
		   ->group(function() {
	        Route::get('/{programmeId}/get-classes', 'AddressController@getProgrammeClass');
	        
        });   
        
	});