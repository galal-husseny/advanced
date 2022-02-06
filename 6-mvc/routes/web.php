<?php

use Src\Http\Route;
use App\Controllers\HomeController;



Route::get('/',function(){
    echo "hello";
});

Route::get('/home',[HomeController::class,'index']);
Route::get('profile',[HomeController::class,'profile']);
Route::post('test',[HomeController::class,'test']);



