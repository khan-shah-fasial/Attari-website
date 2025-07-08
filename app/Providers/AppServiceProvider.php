<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        Schema::defaultStringLength(191);
        
        $debugIp = '103.175.61.38'; // Replace with your actual IP address
        $clientIp = request()->ip(); // Get the client's IP address

        // Enable debug mode if the client's IP matches the specified IP address
        if ($clientIp === $debugIp) {
            config(['app.debug' => true]);
        }        
    }
}
