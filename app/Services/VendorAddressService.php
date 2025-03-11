<?php

namespace App\Services;

use App\Models\VendorAddress;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\VendorAddressRepository;

/**
 * Service class for handling vendor addresses operations
 */
class VendorAddressService
{
    /**
     * Vendor Address Repository
     *
     * @var VendorAddressRepository
     */
    protected VendorAddressRepository $vendorAddressRepository;


    /**
     * Constructor
     *
     * @param VendorAddressRepository $vendorAddressRepository
     */
    public function __construct(VendorAddressRepository $vendorAddressRepository)
    {
        $this->vendorAddressRepository = $vendorAddressRepository;
    }

    /**
     * Get all vendor addresses for a vendor
     *
     * @param int $vendorId
     * @return Collection
     */
    public function getVendorAddresses(int $vendorId) : Collection
    {
        return $this->vendorAddressRepository->getVendorAddresses($vendorId);
    }

    /**
     * Get dropdown data for vendor addresses
     *
     * @return array
     */
    public function getDropdownData() : array
    {
        return $this->vendorAddressRepository->getDropdownData();
    }

    /**
     * Create a new vendor address
     *
     * @param array $data
     * @return VendorAddress
     */
    public function createVendorAddress(array $data) : VendorAddress
    {
        return $this->vendorAddressRepository->createVendorAddress($data);
    }

    /**
     * Update a vendor address
     *
     * @param array $data
     * @param int $id
     * @return VendorAddress
     */
    public function updateVendorAddress(array $data, int $id) : VendorAddress
    {
        return $this->vendorAddressRepository->updateVendorAddress($data, $id);
    }

    /**
     * Delete a vendor address
     *
     * @param int $id
     * @return bool
     */
    public function deleteVendorAddress(int $id) : ?bool
    {
        return $this->vendorAddressRepository->deleteVendorAddress($id);
    }   
}