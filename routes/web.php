<?php

use Illuminate\Support\Facades\Route;

// Include public routes
require __DIR__.'/web/public.php';

// Include vendor routes
require __DIR__.'/web/vendor.php';

// Include manager routes
require __DIR__.'/web/manager.php';

/**
 * Web Routes Configuration
 * 
 * This file serves as the main entry point for all web routes.
 * Routes are organized into separate files for better maintainability:
 * - public.php: Public routes accessible to all users
 * - vendor.php: Vendor-specific routes and authentication
 * - manager.php: Manager/Admin routes and authentication
 */
