<?php

use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\admin\LoginControlller;
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
        Route::get('gallery',[Dashboardcontroller::class,'viewgallery'])->name('gallery');
        Route::get('/profile',[ProfileController::class,'profileshow'])->name('profileshow');
    
    });
});


Route::group(['prefix'=>'admin'],function(){

    Route::group(['middleware'=>'admin.guest'],function(){
        Route::get('login',[LoginControlller::class,'index'])->name('admin.login');
        Route::post('authenticate',[LoginControlller::class,'authenticate'])->name('admin.authenticate');
    });

    Route::group(['middleware'=>'admin.auth'],function(){
        Route::get('dashboard',[AdminDashboardController::class,'index'])->name('admin.dashboard');
        Route::get('createroom',[AdminDashboardController::class,'rooms'])->name('admin.create');
        Route::get('logout',[LoginControlller::class,'logout'])->name('admin.logout');
        Route::post('add_room',[AdminDashboardController::class,'add_room'])->name('add_room');
        Route::get('view_room',[AdminDashboardController::class,'view_room'])->name('admin.viewroom');
        Route::get('delete_room/{id}',[AdminDashboardController::class,'delete_room'])->name('admin.deleteroom');
        Route::get('update_room/{id}',[AdminDashboardController::class,'update_room'])->name('admin.updateroom');
        Route::post('edit_room/{id}',[AdminDashboardController::class,'edit_room'])->name('admin.editroom');
        Route::get('mainpage',[AdminDashboardController::class,'edit_main'])->name('admin.mainpage');
        Route::post('add_main',[AdminDashboardController::class,'add_main'])->name('add_main');
        Route::get('view_main',[AdminDashboardController::class,'view_main'])->name('admin.viewmain');
        Route::get('update_main/{id}',[AdminDashboardController::class,'update_main'])->name('admin.updatemain');
        Route::post('edit_main/{id}',[AdminDashboardController::class,'edit_images'])->name('admin.editimage');
        Route::get('bookings',[AdminDashboardController::class,'booking'])->name('admin.booking');
        Route::get('deletebookings/{id}',[AdminDashboardController::class,'deletebooking'])->name('delete.booking');
        Route::get('approvebook/{id}',[AdminDashboardController::class,'approvebooking'])->name('approve_book');
        Route::get('rejectbook/{id}',[AdminDashboardController::class,'rejectbooking'])->name('reject_book');
        Route::get('view_gallery',[AdminDashboardController::class,'view_gallery'])->name('view_gallery');
        Route::post('uploadgallery',[AdminDashboardController::class,'uploadgallery'])->name('uploadgallery');
        Route::get('deleteimage/{id}',[AdminDashboardController::class,'deleteimage'])->name('deleteimage');
        Route::get('view_newsletter',[AdminDashboardController::class,'view_newsletter'])->name('view_newsletter');
        Route::get('manage_user',[AdminDashboardController::class,'manage_user'])->name('manage_user');
    });
});

Route::get('/rooms',[LoginController::class,'view_room'])->name('account.room');
Route::post('newsletter',[LoginController::class,'add_newsletter'])->name('add_newsletter');
Route::get('/room_details/{id}',[LoginController::class,'room_details'])->name('room_details');
Route::post('/add_booking/{id}',[LoginController::class,'add_booking'])->name('add_booking');
Route::get('/',[LoginController::class,'home'])->name('account.home');




