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
    Route::get('/warlet', 'AdminController@warlet')->name('warlet');
    
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

        Route::name('configuration.')
        ->prefix('{shopId}/configurations')
        ->group(function() {

            Route::name('benefit.')
            ->prefix('benefit')
            ->group(function() {
                Route::get('/plan', 'ShopBenefitPlanController@benefitPlan')->name('plan');
                Route::post('/update', 'ShopBenefitPlanController@update')->name('update');
            });
        });
        // shop payment routes
        Route::name('admin.')
        ->prefix('admins')
        ->group(function() {
            Route::get('/', 'ShopAdminController@index')->name('index');
            Route::get('/create', 'ShopAdminController@create')->name('create');
            Route::post('/{adminId}/pay', 'ShopAdminController@pay')->name('pay');
            Route::post('/register', 'ShopAdminController@register')->name('register');
        });
        Route::name('payment.')
        ->prefix('{shopId}/payment')
        ->group(function() {
            Route::get('/total-fee', 'WorkPaymentController@totalFee')->name('totalFee');
            Route::get('/paid-fee', 'WorkPaymentController@paidFee')->name('paidFee');
            Route::get('/pending-fee', 'WorkPaymentController@pendingFee')->name('pendingFee');
            Route::get('/pending-bonuses', 'WorkPaymentController@pendingBonus')->name('pendingBonus');
            Route::get('/paid-bonuses', 'WorkPaymentController@paidBonus')->name('paidBonus');
            Route::post('/bonus/{bonusId}/clear', 'WorkPaymentController@clearBonus')->name('bonus.clear');
            
        });
        
        // shop apparentes routes
        Route::name('apparent.')
        ->prefix('{shopId}/apparentes')
        ->group(function() {
            Route::get('/', 'ApparentController@index')->name('index');
            Route::get('/create', 'ApparentController@create')->name('create');
            Route::get('/{apparentId}/edit', 'ApparentController@edit')->name('edit');
            Route::get('/{apparentId}/delete', 'ApparentController@delete')->name('delete');
            Route::post('/{apparentId}/update', 'ApparentController@update')->name('update');
            Route::post('/{apparentId}/pay', 'ApparentController@pay')->name('pay');
            Route::get('/application', 'ApparentController@application')->name('application');
            Route::post('/register', 'ApparentController@register')->name('register');
        });

        // shop apparentes routes
        Route::name('design.')
        ->prefix('{shopId}/designs')
        ->group(function() {
            Route::get('/', 'ShopDesignController@index')->name('index');
            Route::get('/work/{workId}/create', 'ShopDesignController@create')->name('create');
            Route::post('/work/{workId}/register', 'ShopDesignController@register')->name('register');

            Route::name('request.')
            ->prefix('{designId}/requests')
            ->group(function() {
                Route::get('/', 'ShopDesignRequestController@index')->name('index');
            });

            Route::name('like.')
            ->prefix('{designId}/likes')
            ->group(function() {
                Route::get('/', 'ShopDesignLikeController@index')->name('index');
            });
        });

        // shop customers routes
        Route::name('customer.')
        ->prefix('{shopId}/customers')
        ->group(function() {
            Route::get('/', 'CustomerController@index')->name('index');
            Route::get('/create', 'CustomerController@create')->name('create');
            Route::get('/{clientId}/edit', 'CustomerController@edit')->name('edit');
            Route::get('/{shopClientId}/delete', 'CustomerController@delete')->name('delete');
            Route::get('/referral', 'CustomerController@referral')->name('referral');
            Route::post('/referral/register', 'CustomerController@referralRegistration')->name('referral.register');
            Route::post('/register', 'CustomerController@register')->name('register');
            Route::post('/{clientId}/update', 'CustomerController@update')->name('update');
            
            // shop customers works routes
            Route::name('work.')
            ->prefix('{clientId}/works')
            ->group(function() {
                Route::get('/', 'CustomerWorkController@index')->name('index');
                Route::get('/create', 'CustomerWorkController@create')->name('create');
                Route::get('/done', 'CustomerWorkController@done')->name('done');
                Route::get('/collect', 'CustomerWorkController@collect')->name('collect');
                Route::post('/register', 'CustomerWorkController@register')->name('register');
                Route::post('/{workId}/update', 'CustomerWorkController@update')->name('update');
                Route::post('/{workId}/pay', 'CustomerWorkController@pay')->name('pay');
                Route::post('/{workId}/benefit/share', 'CustomerWorkController@shareBenefit')->name('benefit.share');

            });
            
            // shop todays works routes
            Route::name('work.')
            ->prefix('/works')
            ->group(function() {
                // today's works routes
                 Route::name('today.')
                ->prefix(date('d-M-Y',time()))
                ->group(function() {
                    Route::get('/', 'CustomerWorkController@workToday')->name('index');
                });

                // today's works routes
                 Route::name('bargain.')
                ->prefix('/bargain')
                ->group(function() {
                    Route::get('/', 'CustomerWorkBargainController@index')->name('index');
                    Route::get('/{workId}/comments', 'CustomerWorkBargainController@comment')->name('comments');
                    Route::post('/{workId}/comment/send', 'CustomerWorkBargainController@sendComment')->name('comment.send');
                });

            });
            

            // shop customers family routes
            Route::name('family.member.')
            ->prefix('{clientId}/family-member')
            ->group(function() {
                Route::get('/', 'CustomerFamilyMemberController@index')->name('index');
                Route::get('/create', 'CustomerFamilyMemberController@create')->name('create');
                Route::post('/register', 'CustomerFamilyMemberController@register')->name('register');
                
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
            Route::post('/{programmeId}/update', 'ProgrammeController@update')->name('update');
            Route::get('/{programmeId}/delete', 'ProgrammeController@delete')->name('delete');

            Route::name('schedule.')
            ->prefix('{programmeId}/weekly-scheduls')
            ->group(function() {
                Route::get('/', 'ProgrammeWeeklyScheduleController@index')->name('index');
                Route::post('/{scheduleId}/update', 'ProgrammeWeeklyScheduleController@update')->name('update');
                Route::get('/{scheduleId}/delete', 'ProgrammeWeeklyScheduleController@delete')->name('delete');
            });

            Route::name('class.')
            ->prefix('{programmeId}/programme-classes')
            ->group(function() {
                Route::get('/', 'ProgrammeClassController@index')->name('index');
                Route::post('/{classId}/update', 'ProgrammeClassController@update')->name('update');
                Route::post('/register', 'ProgrammeClassController@register')->name('register');
                Route::get('/{classId}/delete', 'ProgrammeClassController@delete')->name('delete');
            });

        });
    });
});
