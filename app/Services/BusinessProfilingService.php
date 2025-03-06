<?php

namespace App\Services;

use App\Repositories\BusinessProfilingRepository;
use App\Services\FileUploadService;
use App\Models\BusinessProfile;
use Illuminate\Support\Facades\Storage;

class BusinessProfilingService
{
    protected BusinessProfilingRepository $businessProfilingRepository;
    public function __construct(BusinessProfilingRepository $businessProfilingRepository)
    {
        $this->businessProfilingRepository = $businessProfilingRepository;
    }

    public function getExistingData()
    {
       return $this->businessProfilingRepository->getExistingData();
    }

    public function getDropdownData()
    {
        return $this->businessProfilingRepository->getDropdownData();
        
    }

    public function storeOrUpdate(array $data, string $fileStoragePath){
        if (isset($data['logo']) && $data['logo']->isValid()) {
            $path = FileUploadService::upload($data['logo'],$fileStoragePath);
            $data['logo'] = $path;
        }
        return $this->businessProfilingRepository->storeOrUpdate($data);
    }

    public function MediaDelete(BusinessProfile $businessProfile, string $path){
        if ($path && Storage::disk('public')->exists($path)) {
            FileUploadService::delete($path);
        }
        return $this->businessProfilingRepository->MediaDelete($businessProfile);
    }
}