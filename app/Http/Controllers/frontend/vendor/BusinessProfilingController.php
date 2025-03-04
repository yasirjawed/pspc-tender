<?php

namespace App\Http\Controllers\frontend\vendor;

// FASCADE CLASSES
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

// CONTROLLERS
use App\Http\Controllers\Controller;

// MODELS
use App\Models\Vendor;
use App\Models\BusinessCategory;
use App\Models\BusinessIndustry;

// SERVICES
use App\Services\BusinessProfilingService;
use App\Services\FileUploadService;

// SINGLE ACTION CLASSES
use Auth;
use Crypt;
use DB;

// CUSTOM REQUEST
use App\Http\Requests\frontend\BusinessProfileRequest;

class BusinessProfilingController extends Controller
{
    protected BusinessProfilingService $businessProfilingService;
    protected $fileStoragePath;

    public function __construct(BusinessProfilingService $businessProfilingService)
    {
        $this->businessProfilingService = $businessProfilingService;
        $this->fileStoragePath = 'uploads/business-profile/media/';
    }

    public function businessProfiling(){
        $ExistingData = $this->businessProfilingService->getExistingData();
        $DropDownData = $this->businessProfilingService->getDropdownData();
        return view("frontend.vendor.business-profiling.index",compact("ExistingData","DropDownData"));
    }

    public function storeOrUpdateBusinessProfile(BusinessProfileRequest $request){
        $validated = $request->validated();
        dd($request->all());
        // $path = FileUploadService::upload($request->file('logo'),$this->fileStoragePath);
        // return response()->json(['path' => $path]);
    }
}
