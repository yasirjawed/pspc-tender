<?php

namespace App\Http\Controllers\frontend\vendor;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\RegistrationBodiesService;
use App\Http\Requests\frontend\RegistrationBodiesRequest;
use App\Models\RegistrationBody;
use Auth;
use App\Models\Vendor;
use App\Events\RegistrationBodyUpdated;

/**
 * Class RegistrationBodiesController
 * 
 * Handles Registration Bodies operations.
 */
class RegistrationBodiesController extends Controller
{
    
    /**
     * Constructor
     *
     * @var RegistrationBodiesService #RegistrationBodiesService instance
     */
    protected RegistrationBodiesService $registrationBodiesService;

    /**
     * Vendor
     *
     * @var Vendor #Vendor model instance
     */
    protected Vendor $vendor;


    /**
     * Constructor
     *
     * @param RegistrationBodiesService $registrationBodiesService
     * @param Vendor $vendor
     */
    public function __construct(RegistrationBodiesService $registrationBodiesService, Vendor $vendor)
    {
        $this->registrationBodiesService = $registrationBodiesService;
        $this->vendor = Auth::guard('vendor')->user();
    }   

    /**
     * Get registration bodies
     *
     * @param 
     * @return View with collection of registration bodies and dropdown options
     */
    public function index() : View
    {
        $registrationBodies = $this->registrationBodiesService->getRegistrationBodies();
        $dropdownOptions = $this->registrationBodiesService->getDropdownOptions();
        return view('frontend.vendor.registration-bodies.index', compact('registrationBodies', 'dropdownOptions'));
    }

    /**
     * Show the form for creating a new registration body
     *
     * @return View    
     */ 
    public function create() : View
    {
        $registration_bodies_dropdown_data = $this->registrationBodiesService->getDropdownOptions();
        return view('frontend.vendor.registration-bodies.create', compact('registration_bodies_dropdown_data'));
    }

    /**
     * Store a newly created registration body in the database
     *
     * @param RegistrationBodiesRequest $request, It is the request instance
     * @return RedirectResponse
     */
    public function store(RegistrationBodiesRequest $request) : RedirectResponse
    {
        try {
            $this->registrationBodiesService->createRegistrationBody($request->validated());
            event(new RegistrationBodyUpdated($this->vendor));
            return redirect()->route('web.vendor.registration-bodies.index')->with('success', 'Registration body created successfully');
        } catch (\Exception $e) {
            \Log::error("Error creating registration body: ".$e->getMessage());
            return redirect()->route('web.vendor.registration-bodies.index')->with('error', 'Failed to create registration body');
        }
    }
    
    /**
     * Show the form for editing a registration body
     *
     * @param RegistrationBody $registrationBody, It is the registration body model instance
     * @return View
     */
    public function edit(RegistrationBody $registrationBody)
    {
        $registration_bodies_dropdown_data = $this->registrationBodiesService->getDropdownOptions();
        return view('frontend.vendor.registration-bodies.edit', compact('registrationBody', 'registration_bodies_dropdown_data'));
    }   

    /**
     * Update a registration body in the database
     *
     * @param RegistrationBodiesRequest $request, It is the request instance
     * @param int $id
     * @return RedirectResponse
     */
    public function update(RegistrationBodiesRequest $request, $id) : RedirectResponse
    {
        try {
            $this->registrationBodiesService->updateRegistrationBody($request->validated(), $id);
            return redirect()->back()->with('success', 'Updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }   

    /**
     * Delete a registration body from the database
     *
     * @param int $id
     * @return RedirectResponse    
     */
    public function destroy($id) : RedirectResponse
    {
        try {
            $this->registrationBodiesService->deleteRegistrationBody($id);
            event(new RegistrationBodyUpdated($this->vendor));
            return redirect()->route('web.vendor.registration-bodies.index')->with('success', 'Registration body deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('web.vendor.registration-bodies.index')->with('error', $e->getMessage());
        }
    }      
}
