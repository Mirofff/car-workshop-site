<?php

namespace App\Providers;

use App\Models\Client;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Make sure the directory for compiled views exist
        if (!is_dir(config('view.compiled'))) {
            mkdir(config('view.compiled'), 0755, true);
        }

        Gate::define(
            'delete-vehicle',
            function (Client $client, Vehicle $vehicle) {
                return $client->id === $vehicle->client_id;
            }
        );
    }
}
