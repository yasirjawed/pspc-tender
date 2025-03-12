<?php

namespace App\Services;

use App\Interfaces\SupportingDocumentInterface;
use App\Services\FileUploadService;
use Illuminate\Support\Collection;
use App\Models\SupportingDocument;

class SupportingDocumentService
{
    protected FileUploadService $fileUploadService;
    protected SupportingDocumentInterface $supportingDocumentRepository;
    public function __construct(FileUploadService $fileUploadService, SupportingDocumentInterface $supportingDocumentRepository)
    {
        $this->fileUploadService = $fileUploadService;
        $this->supportingDocumentRepository = $supportingDocumentRepository;
    }

    public function getSupportingDocuments(int $vendorId) : Collection
    {
        return $this->supportingDocumentRepository->getSupportingDocuments($vendorId);
    }

    public function getDropdownData() : array
    {
        return $this->supportingDocumentRepository->getDropdownData();
    }

    public function createSupportingDocument(array $data, string $fileStoragePath)
    {
        try {
            $file = $this->fileUploadService->upload($data['document'],$fileStoragePath);
            $data['path'] = $file;
            return $this->supportingDocumentRepository->createSupportingDocument($data);
        } catch (\Exception $e) {
            \Log::error("Supporting Document Service Create: ",[$e->getMessage()]);
            throw $e;
        }
    }

    public function deleteSupportingDocument(SupportingDocument $supportingDocument)
    {
        try {
            $this->fileUploadService->delete($supportingDocument->path);
            return $this->supportingDocumentRepository->deleteSupportingDocument($supportingDocument);
        } catch (\Exception $e) {
            \Log::error("Supporting Document Service Delete: ",[$e->getMessage()]);
            throw $e;
        }
    }
}