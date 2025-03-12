<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupportingDocument extends Model
{
    protected $fillable = [
        'vendor_id',
        'document_type_id',
        'path',
    ];

    public function documentType()
    {
        return $this->belongsTo(DocumentType::class);
    }
    
    
}
