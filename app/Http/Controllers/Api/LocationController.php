<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\LocationService;

class LocationController extends Controller
{
    protected $locationService;

    public function __construct(LocationService $locationService)
    {
        $this->locationService = $locationService;
    }

    public function getCitiesByCountryCode($countryID){
        $cities = $this->locationService->getCitiesByCountryCode($countryID);
        return response()->json($cities);
    }
}
