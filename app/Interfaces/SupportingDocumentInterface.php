<?php

namespace App\Interfaces;

use Illuminate\Support\Collection;
use App\Models\SupportingDocument;

interface SupportingDocumentInterface
{
    public function getSupportingDocuments(int $vendorId) : Collection;
}