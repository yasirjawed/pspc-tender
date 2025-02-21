<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;

class BusinessIndustry extends Model
{
    public function scopeactive($query)
    {
        return $query->where('status',1);
    }
}
