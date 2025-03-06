<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\businessProfile;

class Vendor extends Authenticatable
{
    protected $fillable = [
        'name',
        'cnic',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function businessProfile(){
        return $this->hasOne(businessProfile::class, 'vendor_id');
    }
}
