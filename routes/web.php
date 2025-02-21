<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\{
    AdminController,
    RoleController,
    DashboardController,
};
use App\Http\Controllers\frontend\vendor\{
    VendorAuthenticator,
    BusinessProfilingController,
    DashboardController as VDashboardController,
};
use App\Http\Middleware\IsVendorAuthenticated;

Route::get('/', function(){
    return view('frontend.pages.index');
})->name('homepage');
Route::prefix('vendor')->as('web.vendor.')->group(function () {
    Route::prefix('authentication')->controller(VendorAuthenticator::class)->as('authentication.')->group(function () {
        Route::group(['middleware' => ['IsVendorAuthenticated:reverse']], function() {
            Route::get('login', 'showLoginForm')->name('login');
            Route::post('login', 'login')->name('login');
            Route::get('register', 'showRegisterForm')->name('register');
            Route::post('register', 'register')->name('register');
            Route::get('verification-page/{UserID}', 'showVerificationPage')->name('verification-page');
            Route::get('forget-password', 'showForgetPasswordForm')->name('forget-password');
            Route::post('forget-password', 'forgetPassword')->name('forget-password');
            Route::get('password-reset/{token}', 'showResetForm')->name('password-reset');
            Route::post('password-reset-submit', 'ResetPassword')->name('password-reset-submit');
        });
        Route::group(['middleware' => ['IsVendorAuthenticated']], function() {
            Route::get('logout', 'logout')->name('logout');
        });
    });
    Route::group(['middleware' => ['IsVendorAuthenticated']], function() {
        Route::prefix('profile')->controller(VDashboardController::class)->as('profile.')->group(function () {
            Route::get('/', 'index')->name('index');
        });
        Route::prefix('business-profiling')->controller(BusinessProfilingController::class)->as('business-profiling.')->group(function () {
            Route::get('/', 'businessProfiling')->name('index');
            Route::post('/', 'storeOrUpdateBusinessProfile')->name('storeOrUpdateBusinessProfile');
        });
    });
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
