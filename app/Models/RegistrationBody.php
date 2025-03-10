<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegistrationBody extends Model
{
    protected $fillable = ['vendor_id', 'external_body', 'registration_number', 'registration_date'];

    public function externalBody()
    {
        return $this->belongsTo(ExternalBody::class, 'external_body', 'id');
    }
}
