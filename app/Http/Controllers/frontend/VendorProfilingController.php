<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\BusinessCategory;
use App\Models\BusinessIndustry;
use Auth;
use Crypt;
use Illuminate\Support\Str;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Services\BusinessProfilingService;
class VendorProfilingController extends Controller
{
    protected BusinessProfilingService $businessProfilingService;
    public function __construct(BusinessProfilingService $businessProfilingService)
    {
        $this->businessProfilingService = $businessProfilingService;
    }

    public function index(){
        return view('frontend.vendor.pages.index');
    }

    public function businessProfiling(){
        $ExistingData = $this->businessProfilingService->getExistingData();
        $DropDownData = $this->businessProfilingService->getDropdownData();
        return view("frontend.vendor.business-profiling.index",compact("DropDownData"));
    }
}
