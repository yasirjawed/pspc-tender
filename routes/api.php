<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LocationController;

Route::get('/cities/{country}', [LocationController::class, 'getCitiesByCountryCode']);
