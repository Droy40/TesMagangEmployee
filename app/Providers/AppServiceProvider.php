<?php

namespace App\Providers;

use App\Models\Employee;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use App\Policies\EmployeePolicy;
use Illuminate\Support\Facades\Gate;

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
                        
    }
}
