<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Models\Vendor;
use App\Models\BusinessCategory;
use App\Models\BusinessIndustry;
use App\Models\Country;
use App\Models\BusinessProfile;

class BusinessProfilingRepository
{
    protected $vendor;

    public function __construct()
    {
        $this->vendor = Auth::guard('vendor')->user();
    }

    public function getExistingData()
    {
        return BusinessProfile::where('vendor_id',$this->vendor->id)->first();
    }

    public function getDropdownData()
    {
        return Cache::remember('dropdown_data', 86400, function () {
            return [
                'business_categories' => BusinessCategory::select('id', 'name')
                    ->orderBy('sorting', 'ASC')
                    ->active()
                    ->get(),

                'business_industries' => BusinessIndustry::select('id', 'name')
                    ->orderBy('sorting', 'ASC')
                    ->active()
                    ->get(),

                'countries' => Country::all(),
            ];
        });
    }

    public function clearDropdownCache()
    {
        Cache::forget('dropdown_data');
    }
}
