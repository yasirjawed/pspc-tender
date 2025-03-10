<?php

namespace App\Services;

use App\Models\RegistrationBody;
use App\Interfaces\RegistrationBodiesInterface;
use Illuminate\Database\Eloquent\Collection;

/**
 * Service class for handling registration bodies operations
 */
class RegistrationBodiesService
{
    /**
     * @var RegistrationBodiesInterface
     */
    protected RegistrationBodiesInterface $registrationBodiesRepository;

    /**
     * Constructor
     *
     * @param RegistrationBodiesInterface $registrationBodiesRepository The registration bodies repository instance
     */
    public function __construct(RegistrationBodiesInterface $registrationBodiesRepository)
    {
        $this->registrationBodiesRepository = $registrationBodiesRepository;
    }

    /**
     * Get all registration bodies for the authenticated vendor
     *
     * @return Collection Returns a collection of RegistrationBody models
     */
    public function getRegistrationBodies(): Collection
    {
        return $this->registrationBodiesRepository->getRegistrationBodies();
    }

    /**
     * Get dropdown options for registration bodies form
     *
     * @return Array Returns a array of collection of External Bodies for the dropdown menu in registration bodies form
     */
    public function getDropdownOptions(): array
    {
        return $this->registrationBodiesRepository->getDropdownOptions();
    }

    /**
     * Create a new registration body
     *
     * @param array $data The data to create the registration body
     * @return Collection Returns a collection of RegistrationBody models
     */
    public function createRegistrationBody(array $data)
    {
        return $this->registrationBodiesRepository->createRegistrationBody($data);
    }

    /**
     * Update a registration body
     *
     * @param array $data The data to update the registration body
     * @return Collection Returns a collection of RegistrationBody models
     */
    public function updateRegistrationBody(array $data, $id)
    {
        return $this->registrationBodiesRepository->updateRegistrationBody($data, $id);
    }

    /**
     * Delete a registration body
     *
     * @param int $id The id of the registration body
     * @return void
     */
    public function deleteRegistrationBody($id)
    {
        return $this->registrationBodiesRepository->deleteRegistrationBody($id);
    }
}
