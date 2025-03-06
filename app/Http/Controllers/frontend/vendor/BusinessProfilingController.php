<?php

namespace App\Http\Controllers\frontend\vendor;

// FASCADE CLASSES
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

// CONTROLLERS
use App\Http\Controllers\Controller;

// MODELS
use App\Models\Vendor;
use App\Models\BusinessCategory;
use App\Models\BusinessIndustry;
use App\Models\BusinessProfile;

// SERVICES
use App\Services\BusinessProfilingService;
use App\Services\FileUploadService;

// SINGLE ACTION CLASSES
use Auth;
use Crypt;
use DB;

// CUSTOM REQUEST
use App\Http\Requests\frontend\BusinessProfileRequest;

// EVENTS
use App\Events\BusinessProfileUpdated;

class BusinessProfilingController extends Controller
{
    protected BusinessProfilingService $businessProfilingService;
    protected $fileStoragePath;
    protected Vendor $vendor;
    public function __construct(BusinessProfilingService $businessProfilingService)
    {
        $this->businessProfilingService = $businessProfilingService;
        $this->fileStoragePath = 'uploads/business-profile/media';
        $this->vendor = Auth::guard('vendor')->user();
    }

    public function businessProfiling(){
        $ExistingData = $this->businessProfilingService->getExistingData();
        $DropDownData = $this->businessProfilingService->getDropdownData();
        return view("frontend.vendor.business-profiling.index",compact("ExistingData","DropDownData"));
    }

    public function storeOrUpdateBusinessProfile(BusinessProfileRequest $request){
        try {
            $validated = $request->validated();
            $data = $this->businessProfilingService->storeOrUpdate($validated,$this->fileStoragePath);
            event(new BusinessProfileUpdated($this->vendor));
            return redirect()->back()->with('success','Business profile has been updated!');
        } catch (\Exception $e) {
            \Log::error("Business Profile Form Submission Error: " . $e->getMessage());
            return redirect()->back()->with('error','Something went wrong!');
        }
    }

    public function mediaDelete(Request $request){
        
        try {
            $profile = BusinessProfile::find($request->id);
            if ($profile && $profile->logo) {
                $this->businessProfilingService->MediaDelete($profile,$profile->logo);
                return response()->json(['success' => true]);
            }
            return response()->json(['success' => false]);
        } catch (\Exception $e) {
            \Log::error("Business Profile Deleting Media: " . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Something went wrong!']);
        }
    }
}
