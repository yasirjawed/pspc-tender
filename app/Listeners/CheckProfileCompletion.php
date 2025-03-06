<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use App\Events\BusinessProfileUpdated;
use App\Services\ProfileCompletionService;
use Illuminate\Support\Facades\Session;

class CheckProfileCompletion
{
    protected $profileService;

    public function __construct(ProfileCompletionService $profileService)
    {
        $this->profileService = $profileService;
    }

    public function handle(Login|BusinessProfileUpdated $event): void
    {
        $user = $event->user;
        $incompleteSections = $this->profileService->checkIncompleteSections($user);
        Session::put('profile_incomplete', $incompleteSections);
    }
}

