<?php

namespace App\Services;

use App\Interfaces\SupportingDocumentInterface;
use App\Services\FileUploadService;
use Illuminate\Support\Collection;

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
    
}