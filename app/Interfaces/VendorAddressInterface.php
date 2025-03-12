<?php

namespace App\Interfaces;

// MODELS
use App\Models\VendorAddress;
use Illuminate\Database\Eloquent\Collection;

interface VendorAddressInterface
{
    public function getVendorAddresses(int $vendorId): Collection;
    public function getDropdownData(): array;
    public function createVendorAddress(array $data): VendorAddress;
    public function updateVendorAddress(array $data, int $id): VendorAddress;
    public function deleteVendorAddress(int $id): bool;
}