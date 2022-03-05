<?php

use Src\Http\Route;
use App\Controllers\HomeController;
use App\Controllers\DashboardController;
use App\Controllers\Auth\LoginController;
use App\Controllers\Auth\EmailVerification;
use App\Controllers\Auth\RegisterController;
use App\Controllers\Auth\ResetPasswordController;


Route::get('/',[HomeController::class,'index']);
// register
Route::get('signup',[RegisterController::class,'index']);
Route::post('signup',[RegisterController::class,'store']);
//lgoin
Route::get('signin',[LoginController::class,'index']);
Route::post('signin',[LoginController::class,'login']);
Route::post('/logout',[LoginController::class,'logout']);
// email verification
Route::get('/email-verification',[EmailVerification::class,'verify']);
Route::get('verify-account',[EmailVerification::class,'index']);
Route::post('resend-verification-link',[EmailVerification::class,'resend']);
//dashboard
Route::get('dashboard',[DashboardController::class,'index']);
// reset password
Route::get('email/verify',[ResetPasswordController::class,'emailVerificationIndex']);
Route::post('email/verify',[ResetPasswordController::class,'emailVerification']);
Route::get('change-password',[ResetPasswordController::class,'index']);
Route::post('change-password',[ResetPasswordController::class,'changePassword']);