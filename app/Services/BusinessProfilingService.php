<?php

namespace App\Services;

use App\Repositories\BusinessProfilingRepository;
use App\Services\FileUploadService;

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
}