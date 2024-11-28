<?php

use App\Http\Controllers\Dashboard\Auth\forgetPassword\ForgetPasswordController;
use App\Http\Controllers\Dashboard\Auth\forgetPassword\ResetPasswordController;
use App\Http\Controllers\Dashboard\Auth\LoginController;
use App\Http\Controllers\dashboard\Home\HomeController;
use App\Http\Controllers\Dashboard\Home\RoleController;
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


            });
             ############################## end home page ########################################

        });




