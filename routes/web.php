<?php

use App\Http\Controllers\Dashboardcontroller;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homecontroller;
use App\Http\Controllers\ProfileController;

Route::group(['prefix'=>'account'],function(){

    Route::group(['middleware'=>'guest'],function(){
        Route::get('login',[LoginController::class,'index'])->name('account.login');
        Route::get('register',[LoginController::class,'register'])->name('account.register');    
        Route::post('process-register',[LoginController::class,'processRegister'])->name('account.processRegister');
        Route::post('authenticate',[LoginController::class,'authenticate'])->name('account.authenticate');
    });

    Route::group(['middleware'=>'auth'],function(){
        Route::get('logout',[LoginController::class,'logout'])->name('account.logout');
        Route::get('dashboard',[Dashboardcontroller::class,'index'])->name('account.dashboard');
        Route::get('/profile',[ProfileController::class,'profileshow'])->name('profileshow');
    
    });
});
Route::get('/',[homecontroller::class,'index']);



