<?php

namespace App\Services;

use App\Models\Vendor;

class ProfileCompletionService
{
    public function checkIncompleteSections(Vendor $user): array
    {
        $incompleteSections = [];
        if (!$user->businessProfile) {
            $incompleteSections["business-profile"] = true;
        }
        if (!$user->registrationBodies->count()) {
            $incompleteSections["registration-bodies"] = true;
        }
        if (!$user->supportingDocuments->count()) {
            $incompleteSections["supporting-documents"] = true;
        }
        if (!$user->vendorAddresses->count()) {
            $incompleteSections["vendor-addresses"] = true;
        }
        if (!$user->ppraRegisterations) {
            $incompleteSections["ppra-registrations"] = true;
        }

        return $incompleteSections;
    }
}
