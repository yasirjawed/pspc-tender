<?php

namespace App\Services;

use App\Repositories\BusinessProfilingRepository;
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
}