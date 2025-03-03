<?php

namespace App\Services;
use App\Models\City;

class LocationService
{
    public function getCitiesByCountryCode($countryId)
    {
        return City::where('country_id', $countryId)->pluck('name', 'id');
    }

}