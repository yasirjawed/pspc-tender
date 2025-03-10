<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Interfaces\RegistrationBodiesInterface;
use App\Repositories\RegistrationBodiesRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(RegistrationBodiesInterface::class, RegistrationBodiesRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
