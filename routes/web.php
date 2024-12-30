<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\{
    AdminController,
    RoleController,
    DashboardController,
};

Route::get('/', function(){
    return view('frontend.pages.index');
});

Route::group(['prefix' => 'manager'], function(){
    Route::get('/login',[AdminController::class, 'ShowLoginForm'])->name('manager.login');
    Route::post('/login',[AdminController::class, 'loginPost'])->name('manager.login.post');
    Route::group(['middleware' => ['auth:admin']], function() {
        Route::get('/',[DashboardController::class, 'index'])->name('manager.dashboard');
        Route::post('/logout',[AdminController::class, 'logout'])->name('manager.logout');
        Route::resource('roles', RoleController::class);
        Route::resource('users', AdminController::class);
    });
});
