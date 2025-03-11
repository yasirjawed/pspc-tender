<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\vendor\{
    VendorAuthenticator,
    BusinessProfilingController,
    RegistrationBodiesController,
    VendorAddressController,  
    SupportingDocumentController,
    DashboardController as VDashboardController,
};
use App\Http\Middleware\IsVendorAuthenticated;

/**
 * Vendor Routes
 * 
 * All vendor-related routes are grouped under the 'vendor' prefix
 * and use the 'web.vendor' name prefix for route naming
 */
Route::prefix('vendor')->as('web.vendor.')->group(function () {
    /**
     * Vendor Authentication Routes
     * 
     * Handles all vendor authentication related functionality including:
     * - Login/Logout
     * - Registration
     * - Email Verification
     * - Password Reset
     */
    Route::prefix('authentication')->controller(VendorAuthenticator::class)->as('authentication.')->group(function () {
        // Routes accessible only to non-authenticated vendors
        Route::group(['middleware' => ['IsVendorAuthenticated:reverse']], function() {
            // Login routes
            Route::get('login', 'showLoginForm')->name('login');
            Route::post('login', 'login')->name('login');
            
            // Registration routes
            Route::get('register', 'showRegisterForm')->name('register');
            Route::post('register', 'register')->name('register');
            
            // Email verification
            Route::get('verification-page/{UserID}', 'showVerificationPage')->name('verification-page');
            
            // Password reset routes
            Route::get('forget-password', 'showForgetPasswordForm')->name('forget-password');
            Route::post('forget-password', 'forgetPassword')->name('forget-password');
            Route::get('password-reset/{token}', 'showResetForm')->name('password-reset');
            Route::post('password-reset-submit', 'ResetPassword')->name('password-reset-submit');
        });

        // Logout route - only accessible to authenticated vendors
        Route::group(['middleware' => ['IsVendorAuthenticated']], function() {
            Route::get('logout', 'logout')->name('logout');
        });
    });

    /**
     * Authenticated Vendor Routes
     * 
     * All routes that require vendor authentication
     */
    Route::group(['middleware' => ['IsVendorAuthenticated']], function() {
        // Vendor Profile Management
        Route::prefix('profile')->controller(VDashboardController::class)->as('profile.')->group(function () {
            Route::get('/', 'index')->name('index');
        });

        // Business Profiling Management
        Route::prefix('business-profiling')->controller(BusinessProfilingController::class)->as('business-profiling.')->group(function () {
            Route::get('/', 'businessProfiling')->name('index');
            Route::post('/', 'storeOrUpdateBusinessProfile')->name('storeOrUpdateBusinessProfile');
            Route::post('/media-delete', 'mediaDelete')->name('media-delete');
        });

        // Registration Bodies Management
        Route::resource('registration-bodies', RegistrationBodiesController::class);

        // Vendor Addresses Management
        Route::resource('vendor-addresses', VendorAddressController::class);

        // Supporting Documents Management
        Route::resource('supporting-documents', SupportingDocumentController::class);
    });
}); 