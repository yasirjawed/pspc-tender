<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\{
    AdminController,
    RoleController,
    DashboardController,
};

/**
 * Manager/Admin Routes
 * 
 * All administrative routes for system managers
 */
Route::group(['prefix' => 'manager'], function(){
    // Authentication routes for managers
    Route::get('/login',[AdminController::class, 'ShowLoginForm'])->name('manager.login');
    Route::post('/login',[AdminController::class, 'loginPost'])->name('manager.login.post');

    // Protected manager routes requiring authentication
    Route::group(['middleware' => ['auth:admin']], function() {
        Route::get('/',[DashboardController::class, 'index'])->name('manager.dashboard');
        Route::post('/logout',[AdminController::class, 'logout'])->name('manager.logout');
        
        // Resource routes for role and user management
        Route::resource('roles', RoleController::class);
        Route::resource('users', AdminController::class);
    });
}); 