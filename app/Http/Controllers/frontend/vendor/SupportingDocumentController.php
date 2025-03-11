<?php

namespace App\Http\Controllers\frontend\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SupportingDocumentService;
use App\Models\Vendor;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
class SupportingDocumentController extends Controller
{
    protected SupportingDocumentService $supportingDocumentService;
    protected Vendor $vendor;   
    public function __construct(SupportingDocumentService $supportingDocumentService, Vendor $vendor)
    {
        $this->supportingDocumentService = $supportingDocumentService;
        $this->vendor = Auth::guard('vendor')->user();
    }

    public function index() : View
    {
        $supportingDocuments = $this->supportingDocumentService->getSupportingDocuments($this->vendor->id);
        dd($supportingDocuments);
        return view('frontend.vendor.pages.supporting-documents.index', compact('supportingDocuments'));
    }
}
