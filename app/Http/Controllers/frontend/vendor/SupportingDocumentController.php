<?php

namespace App\Http\Controllers\frontend\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SupportingDocumentService;
use App\Models\Vendor;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\frontend\SupportingDocumentRequest;
use Illuminate\Http\RedirectResponse;
use App\Models\SupportingDocument;
use App\Events\SupportingDocumentUpdated;
class SupportingDocumentController extends Controller
{
    protected SupportingDocumentService $supportingDocumentService;
    protected Vendor $vendor;   
    protected string $fileStoragePath;

    public function __construct(SupportingDocumentService $supportingDocumentService, Vendor $vendor)
    {
        $this->supportingDocumentService = $supportingDocumentService;
        $this->vendor = Auth::guard('vendor')->user();
        $this->fileStoragePath = 'uploads/supporting-documents/media';
    }

    public function index() : View
    {
        $supportingDocuments = $this->supportingDocumentService->getSupportingDocuments($this->vendor->id);
        return view('frontend.vendor.supporting-documents.index', compact('supportingDocuments'));
    }

    public function create() : View
    {
        $supporting_documents_dropdown_data = $this->supportingDocumentService->getDropdownData();
        return view('frontend.vendor.supporting-documents.create', compact('supporting_documents_dropdown_data'));
    }

    public function store(SupportingDocumentRequest $request) : RedirectResponse
    {
        try {
            $this->supportingDocumentService->createSupportingDocument($request->validated(),$this->fileStoragePath);
            event(new SupportingDocumentUpdated($this->vendor));
            return redirect()->route('web.vendor.supporting-documents.index')->with('success', 'Supporting Document Added Successfully');
        } catch (\Exception $e) {
            \Log::error("Supporting Document Controller Store: ",[$e->getMessage()]);
            return redirect()->route('web.vendor.supporting-documents.index')->with('error', 'Failed to add supporting document');
        }
    }

    public function destroy(SupportingDocument $supportingDocument) : RedirectResponse
    {
        try {   
            $this->supportingDocumentService->deleteSupportingDocument($supportingDocument);
            event(new SupportingDocumentUpdated($this->vendor));
            return redirect()->route('web.vendor.supporting-documents.index')->with('success', 'Supporting Document Deleted Successfully');
        } catch (\Exception $e) {
            \Log::error("Supporting Document Controller Destroy: ",[$e->getMessage()]);
            return redirect()->route('web.vendor.supporting-documents.index')->with('error', 'Failed to delete supporting document');
        }
    }
}
