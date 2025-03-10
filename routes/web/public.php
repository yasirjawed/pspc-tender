<?php

use Illuminate\Support\Facades\Route;

/**
 * Public Routes
 * 
 * Contains all publicly accessible routes that don't require authentication
 */
Route::get('/', function(){
    return view('frontend.pages.index');
})->name('homepage'); 