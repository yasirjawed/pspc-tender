<?php

namespace App\Repositories;

use App\Models\SupportingDocument;
use App\Models\DocumentType;
use App\Interfaces\SupportingDocumentInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

class SupportingDocumentRepository implements SupportingDocumentInterface
{
    public function getSupportingDocuments(int $vendorId) : Collection
    {
        return SupportingDocument::where('vendor_id', $vendorId)->get();
    }

    public function getDropdownData() : array
    {
        return Cache::remember('supporting_documents_dropdown_data', 86400, function () {
            return [
                'document_types' => DocumentType::select('id', 'name')
                    ->get()
            ];
        });
    }

    public function createSupportingDocument(array $data) : SupportingDocument
    {
        try {
            $data['vendor_id'] = Auth::guard('vendor')->user()->id;
            return SupportingDocument::create($data);
        } catch (\Exception $e) {
            \Log::error("Supporting Document Repository Create: ",[$e->getMessage()]);
            throw $e;
        }
    }

    public function deleteSupportingDocument(SupportingDocument $supportingDocument) : bool
    {
        try {
            return $supportingDocument->delete();
        } catch (\Exception $e) {
            \Log::error("Supporting Document Repository Delete: ",[$e->getMessage()]);
            throw $e;
        }
    }
}