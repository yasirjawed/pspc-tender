<?php

namespace App\Interfaces;

use Illuminate\Support\Collection;
use App\Models\SupportingDocument;

interface SupportingDocumentInterface
{
    public function getSupportingDocuments(int $vendorId) : Collection;
    public function createSupportingDocument(array $data) : SupportingDocument;
    public function deleteSupportingDocument(SupportingDocument $supportingDocument) : bool;
}