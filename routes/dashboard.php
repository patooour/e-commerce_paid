<?php

use App\Http\Controllers\Dashboard\Auth\forgetPassword\ForgetPasswordController;
use App\Http\Controllers\Dashboard\Auth\forgetPassword\ResetPasswordController;
use App\Http\Controllers\Dashboard\Auth\LoginController;
use App\Http\Controllers\Dashboard\Home\AdminController;
use App\Http\Controllers\Dashboard\Home\BrandController;
use App\Http\Controllers\Dashboard\Home\CategoryController;
use App\Http\Controllers\dashboard\Home\HomeController;
use App\Http\Controllers\Dashboard\Home\RoleController;
use App\Http\Controllers\Dashboard\Home\WorldController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group(
        [
            'prefix' => LaravelLocalization::setLocale() . '/dashboard',
            'as' => 'dashboard.',
            'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
        ], function(){

            Route::get('forget-password' ,[ForgetPasswordController::class, 'showForgetPassword'])->name('forgetPassword');
            Route::post('forget/sendMail' ,[ForgetPasswordController::class, 'sendMail'])->name('forget.sendMail');

            Route::get('verify/{email}' ,[ForgetPasswordController::class, 'verifyOtp'])->name('verifyOtp');
            Route::post('verify/otp' ,[ForgetPasswordController::class, 'verifyOtpEmail'])->name('verifyOtpEmail');

            Route::get('resetPassword/{email}' ,[ResetPasswordController::class, 'getResetPassword'])->name('getResetPassword');
            Route::post('resetPassword' ,[ResetPasswordController::class, 'resetPassword'])->name('resetPassword');


             ############################## Auth  ############################################

            Route::get('login' ,[LoginController::class, 'showLoginForm'])->name('login');
            Route::post('login' ,[LoginController::class, 'login'])->name('doLogin');
            Route::get('logout' ,[LoginController::class, 'logout'])->name('logout')->middleware('auth:admin');

            ############################## end Auth ############################################

            ############################## Home page ############################################
            Route::group(['middleware' => 'auth:admin'], function(){
                Route::get('home' ,[HomeController::class, 'getHomePage'])->name('home');


                ############################## Role permission  ############################################
                Route::group(['middleware'=>'can:roles'], function (){
                    Route::resource('roles' ,RoleController::class);
                });
                ############################## end Role permission  ############################################


                ############################## Admins Management  ############################################
                Route::group(['middleware'=>'can:admins'], function (){
                    Route::resource('admins' ,AdminController::class);
                    Route::get('admins/{id}/status' ,[AdminController::class,'changeStatus'])->name('admins.status');
                    Route::post('admins/search' ,[AdminController::class,'search'])->name('admins.search');

                });
                ############################## end Admins Management  ############################################

                ############################## categories Management  ############################################
                Route::group(['middleware'=>'can:categories'], function (){
                    Route::resource('categories' ,CategoryController::class);
                    Route::get('categories/{catID}/status' ,[CategoryController::class,'changeStatus'])->name('categories.status');
                    Route::get('categories-getAll' ,[CategoryController::class , 'getAll'])->name('categories.getAll');

                });
                ############################## end categories Management  ############################################

                ############################## brands Management  ############################################
                Route::group(['middleware'=>'can:brands'], function (){
                    Route::resource('brands' ,BrandController::class);
                    Route::get('brands/{catID}/status' ,[BrandController::class,'changeStatus'])->name('brands.status');
                    Route::get('brands-getAll' ,[BrandController::class , 'getAll'])->name('brands.getAll');

                });
                ############################## end brands Management  ############################################

                ############################## Start World [country - city - governorate] Management  ############################################
                Route::group(['middleware'=>'can:world'], function (){
                    Route::controller( WorldController::class)->prefix('world')->as('world.')->group(function (){
                        Route::get('/countries' ,'getAllCountries')->name('countries');
                        Route::get('/status/{country_id}' ,'changeStatus')->name('countries.status');
                        Route::post('countries/search' ,'search')->name('countries.search');
                        Route::get('/{country_id}/governorate' ,'getAllGovernorates')->name('governorates');

                        Route::group(['prefix'=>'governorates' , 'as'=>'governorates.'] , function (){
                            Route::get('/change-status/{gov_id}' ,'changeStatusGov')->name('status');
                            Route::post('/shipping-price' ,'changeShippingPrice')->name('shipping.change');
                            Route::post('/search' ,'searchGov')->name('search');

                        });

                    });

                });
                ############################## end World [country - city - governorate] Management ############################################

            });
             ############################## end home page ########################################

        });




