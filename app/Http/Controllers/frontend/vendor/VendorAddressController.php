<?php

namespace App\Http\Controllers\Frontend\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Services\VendorAddressService;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\frontend\VendorAddressRequest;
use App\Models\VendorAddress;
use App\Events\VendorAddressUpdated;

/**
 * Class VendorAddressController
 *
 * Manages vendor address-related operations.
 */
class VendorAddressController extends Controller
{
    protected VendorAddressService $vendorAddressService;
    protected Vendor $vendor;

    public function __construct(VendorAddressService $vendorAddressService)
    {
        $this->vendorAddressService = $vendorAddressService;
        $this->vendor = Auth::guard('vendor')->user();
    }

    public function index(): View
    {
        $vendorAddresses = $this->vendorAddressService->getVendorAddresses($this->vendor->id);
        return view('frontend.vendor.vendor-addresses.index', compact('vendorAddresses'));
    }

    public function create(): View
    {
        $vendor_address_dropdown_data = $this->vendorAddressService->getDropdownData();
        return view('frontend.vendor.vendor-addresses.create', compact('vendor_address_dropdown_data'));
    }
    
    public function store(VendorAddressRequest $request)
    {
        try {
            $vendorAddress = $this->vendorAddressService->createVendorAddress($request->validated());
            event(new VendorAddressUpdated($this->vendor));
            return redirect()->route('web.vendor.vendor-addresses.index')->with('success', 'Vendor address created successfully');
        } catch (\Exception $e) {
            \Log::error("Error creating vendor address: ".$e->getMessage());
            return redirect()->route('web.vendor.vendor-addresses.index')->with('error', 'Failed to create vendor address');
        }
    }

    public function edit(VendorAddress $VendorAddress)
    {
        $vendor_address_dropdown_data = $this->vendorAddressService->getDropdownData();
        return view('frontend.vendor.vendor-addresses.edit', compact('vendor_address_dropdown_data', 'VendorAddress'));
    }

    public function update(VendorAddressRequest $request, VendorAddress $VendorAddress)
    {
        try {
            $this->vendorAddressService->updateVendorAddress($request->validated(), $VendorAddress->id);
            return redirect()->back()->with('success', 'Vendor address updated successfully');
        } catch (\Exception $e) {
            \Log::error("Error updating vendor address: ".$e->getMessage());
            return redirect()->route('web.vendor.vendor-addresses.index')->with('error', 'Failed to update vendor address');
        }
    }

    public function destroy(string $id)
    {
        try {
            $this->vendorAddressService->deleteVendorAddress($id);
            event(new VendorAddressUpdated($this->vendor));
            return redirect()->route('web.vendor.vendor-addresses.index')->with('success', 'Vendor address deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('web.vendor.vendor-addresses.index')->with('error', $e->getMessage());
        }
    }
}
