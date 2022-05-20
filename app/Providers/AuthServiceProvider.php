<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\user;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define("admin", function(User $user){
            return $user->hasRole("admin");
        });

        Gate::define("gestionnaire", function(User $user){
            return $user->hasRole("gestionnaire");
        });

        Gate::define("employe", function(User $user){
            return $user->hasRole("employe");
        });

        Gate::after(function (User $user) {
           return $user->hasRole("superadmin");
        });
    }
}
