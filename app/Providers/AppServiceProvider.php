<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Interfaces\{
    RegistrationBodiesInterface,
    SupportingDocumentInterface,
    VendorAddressInterface
};
use App\Repositories\{
    RegistrationBodiesRepository,
    SupportingDocumentRepository,
    VendorAddressRepository
};

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(RegistrationBodiesInterface::class, RegistrationBodiesRepository::class);
        $this->app->bind(SupportingDocumentInterface::class, SupportingDocumentRepository::class);
        $this->app->bind(VendorAddressInterface::class, VendorAddressRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
