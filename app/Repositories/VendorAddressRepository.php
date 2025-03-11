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

    protected VendorAddress $model;
    public function __construct(VendorAddress $model)
    {
        $this->model = $model;
    }

    public function getVendorAddresses(int $vendorId): Collection
    {
        return VendorAddress::where('vendor_id', $vendorId)->get();
    }

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

    public function createVendorAddress(array $data) : VendorAddress
    {
        $data['vendor_id'] = Auth::guard('vendor')->user()->id;
        return $this->model->create($data);
    }

    public function updateVendorAddress(array $data, int $id) : VendorAddress
    {
        $vendorAddress = $this->model->findOrFail($id);
        $vendorAddress->update($data);
        return $vendorAddress;
    }

    public function deleteVendorAddress(int $id) : void
    {
        $vendorAddress = $this->model->findOrFail($id);
        if (!$vendorAddress) {
            throw new ModelNotFoundException('Vendor address not found.');
        }
        $vendorAddress->delete();
    }
}

