<?php

namespace App\Repositories;

use App\Models\RegistrationBody;
use App\Models\ExternalBody;
use App\Interfaces\RegistrationBodiesInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Repository class for handling registration bodies database operations
 * 
 * This repository handles all database interactions for RegistrationBody model
 * and implements the RegistrationBodiesInterface
 */
class RegistrationBodiesRepository implements RegistrationBodiesInterface
{
    /**
     * The RegistrationBody model instance
     * 
     * @var RegistrationBody
     */
    protected RegistrationBody $model;

    /**
     * Constructor
     *
     * @param RegistrationBody $model The RegistrationBody model instance
     */
    public function __construct(RegistrationBody $model)
    {
        $this->model = $model;
    }

    /**
     * Get all registration bodies for the authenticated vendor
     *
     * Retrieves a collection of registration bodies associated with 
     * the currently authenticated vendor, ordered by latest first
     *
     * @return Collection Returns a collection of RegistrationBody models
     */
    public function getRegistrationBodies(): Collection
    {
        return $this->model
            ->where('vendor_id', Auth::guard('vendor')->user()->id)
            ->with('externalBody')
            ->latest()
            ->get();
    }
    
    /**
     * Get dropdown options for registration bodies
     *
     * Retrieves a collection of external bodies for the dropdown menu
     *
     * @return Array Returns a array of collection of ExternalBody models with id and name, it also caches the data for 24 hours
     */
    public function getDropdownOptions(): array
    {
        return Cache::remember('registration_bodies_dropdown_data', 86400, function () {
            return [
                'external_bodies' => ExternalBody::select('id', 'body_name')
                    ->get()
            ];
        });
    }

    /**
     * Create a new registration body
     *
     * @param array $data The data to create the registration body
     * @return RegistrationBody
     */
    public function createRegistrationBody(array $data): RegistrationBody
    {
        $data['vendor_id'] = Auth::guard('vendor')->user()->id;
        return $this->model->create($data);
    }

    /**
     * Update a registration body
     *
     * @param array $data The data to update the registration body
     * @param int $id The id of the registration body
     * @return RegistrationBody Returns a collection of RegistrationBody models
     */
    public function updateRegistrationBody(array $data, $id): ?RegistrationBody
    {
        $registrationBody = $this->model->find($id);
        if(!$registrationBody) {
            throw new ModelNotFoundException('Registration body not found.');
        }
        $registrationBody->update($data);
        return $registrationBody;
    }

    /**
     * Delete a registration body
     *
     * @param int $id The ID of the registration body
     * @return bool Returns true if deletion was successful, false otherwise
     * @throws ModelNotFoundException if the record is not found
     */
    public function deleteRegistrationBody($id): bool
    {
        $registrationBody = $this->model->find($id);

        if (!$registrationBody) {
            throw new ModelNotFoundException('Registration body not found.');
        }

        return $registrationBody->delete();
    }

}