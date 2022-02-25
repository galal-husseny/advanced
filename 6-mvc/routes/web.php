<?php

use Src\Http\Route;
use App\Controllers\HomeController;
use App\Controllers\DashboardController;
use App\Controllers\Auth\LoginController;
use App\Controllers\Auth\EmailVerification;
use App\Controllers\Auth\RegisterController;


Route::get('/',[HomeController::class,'index']);
Route::get('signin',[LoginController::class,'index']);
Route::post('signin',[LoginController::class,'login']);
Route::get('signup',[RegisterController::class,'index']);
Route::post('signup',[RegisterController::class,'store']);
Route::get('/email-verification',[EmailVerification::class,'verify']);
Route::get('dashboard',[DashboardController::class,'index']);
Route::post('/logout',[LoginController::class,'logout']);