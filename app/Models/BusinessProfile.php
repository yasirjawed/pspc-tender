<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessProfile extends Model
{
    protected $fillable = ['vendor_id','categories','industries','description','name','short_name','origin_country','city','date_of_incorporation','website_url','logo'];
    protected $guarded = ['id'];
    protected $casts = [
        'date_of_incorporation' => 'datetime',
    ];
    public function country()
    {
        return $this->belongsTo(Country::class, 'origin_country');
    }
}
