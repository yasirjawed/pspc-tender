<?php

namespace App\Interfaces;

// MODELS
use App\Models\VendorAddress;
use Illuminate\Database\Eloquent\Collection;

interface VendorAddressInterface
{
    public function getVendorAddresses(int $vendorId): Collection;
}