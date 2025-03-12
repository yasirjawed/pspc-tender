<?php

namespace App\Repositories;

// MODELS
use App\Models\VendorAddress;
use App\Models\AddressType;
use App\Models\Country;

// INTERFACES
use App\Interfaces\VendorAddressInterface;

// COLLECTIONS
use Illuminate\Database\Eloquent\Collection;

// Facades
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

/**
 * Repository class for handling vendor addresses database operations
 * 
 * This repository handles all database interactions for VendorAddress model
 * and implements the VendorAddressInterface
 */
class VendorAddressRepository implements VendorAddressInterface
{

    /**
     * @var VendorAddress
     */
    protected VendorAddress $model;

    /**
     * @param VendorAddress $model
     */
    public function __construct(VendorAddress $model)
    {
        $this->model = $model;
    }

    /**
     * Get all vendor addresses for a specific vendor
     * 
     * @param int $vendorId
     * @return Collection
     */ 
    public function getVendorAddresses(int $vendorId): Collection
    {
        return VendorAddress::where('vendor_id', $vendorId)->get();
    }

    /**
     * Get dropdown data for vendor addresses cache it for 1 day
     * 
     * @return array
     */
    public function getDropdownData(): array
    {
        return Cache::remember('vendor_address_dropdown_data', 86400, function () {
            return [
                'address_types' => AddressType::select('id', 'name')
                    ->get(),
                'countries' => Country::select('id', 'name')
                    ->get(),
            ];
        });
    }

    /**
     * Create a new vendor address
     * 
     * @param array $data
     * @return VendorAddress
     * @throws \Exception
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */ 
    public function createVendorAddress(array $data) : VendorAddress
    {
        try {
            $data['vendor_id'] = Auth::guard('vendor')->user()->id;
            return $this->model->create($data);
        } catch (\Exception $e) {
            \Log::error('Failed to create vendor address Repository: ' . $e->getMessage());
            throw new \Exception('Failed to create vendor address: ' . $e->getMessage());
        }
    }

    /**
     * Update a vendor address
     * 
     * @param array $data
     * @param int $id
     * @return VendorAddress
     * @throws \Exception
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */     
    public function updateVendorAddress(array $data, int $id) : VendorAddress
    {
        try {   
            $vendorAddress = $this->model->findOrFail($id);
            $vendorAddress->update($data);
            return $vendorAddress;
        } catch (\Exception $e) {
            \Log::error('Failed to update vendor address Repository: ' . $e->getMessage());
            throw new \Exception('Failed to update vendor address: ' . $e->getMessage());
        }
    }

    /**
     * Delete a vendor address
     * 
     * @param int $id
     * @return bool
     * @throws \Exception
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */     
    public function deleteVendorAddress(int $id) : bool
    {
        try {
            $vendorAddress = $this->model->findOrFail($id);
            return $vendorAddress->delete();
        } catch (\Exception $e) {
            \Log::error('Failed to delete vendor address Repository: ' . $e->getMessage());
            throw new \Exception('Failed to delete vendor address: ' . $e->getMessage());
        }
    }
}

