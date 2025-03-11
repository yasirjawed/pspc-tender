<?php

namespace App\Repositories;

use App\Models\SupportingDocument;
use App\Interfaces\SupportingDocumentInterface;
use Illuminate\Support\Collection;

class SupportingDocumentRepository implements SupportingDocumentInterface
{
    public function getSupportingDocuments(int $vendorId) : Collection
    {
        return SupportingDocument::where('vendor_id', $vendorId)->get();
    }
}