<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VendorAddress extends Model
{
    protected $fillable = [
        'vendor_id',
        'address_type_id',
        'full_address',
        'zip_code',
        'country_id',
        'city_id',
        'gis_latitude',
        'gis_longitude',
        'email',
        'mobile',
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function addressType()
    {   
        return $this->belongsTo(AddressType::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
