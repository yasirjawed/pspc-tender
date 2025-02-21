<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;
use App\Models\Vendor;
use App\Models\BusinessCategory;
use App\Models\BusinessIndustry;

class BusinessProfilingRepository
{
    protected $vendor;

    public function __construct()
    {
        $this->vendor = Auth::guard('vendor')->user();
    }

    public function getData()
    {
        return $this->vendor;
    }

    public function getDropdownData()
    {
        return [
            'business_categories' => BusinessCategory::select('id','name')->orderBy('sorting','ASC')->active()->get(),
            'business_industries' => BusinessIndustry::select('id','name')->orderBy('sorting','ASC')->active()->get(),
        ];
    }
}
