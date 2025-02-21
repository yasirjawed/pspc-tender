<?php

namespace App\Http\Controllers\frontend\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view("frontend.vendor.pages.index");
    }
}
