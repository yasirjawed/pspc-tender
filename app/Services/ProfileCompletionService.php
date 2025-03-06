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
        if (!$user->registerationBodies) {
            $incompleteSections["registeration-bodies"] = true;
        }
        if (!$user->supportingDocuments) {
            $incompleteSections["supporting-documents"] = true;
        }
        if (!$user->vendorAddresses) {
            $incompleteSections["vendor-addresses"] = true;
        }
        if (!$user->ppraRegisterations) {
            $incompleteSections["ppra-registrations"] = true;
        }

        return $incompleteSections;
    }
}
