<?php

namespace App\Interfaces;

// MODELS
use App\Models\RegistrationBody;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface for handling registration bodies operations
 */
interface RegistrationBodiesInterface
{
    public function getRegistrationBodies(): Collection;
    public function getDropdownOptions(): array;
    public function createRegistrationBody(array $data): RegistrationBody;
    public function updateRegistrationBody(array $data, $id): ?RegistrationBody;
    public function deleteRegistrationBody($id): bool;
}