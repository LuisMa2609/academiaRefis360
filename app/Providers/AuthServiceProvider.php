<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('admin', function($user){
            return $user->rol == '1';
        });

        Gate::define('user', function($user){
            return $user->rol == '0';
        });

        Gate::define('lectura', function($user){
            return $user->permiso_id == '1';
        });

        // Gate::define('escritura', function($user){
        //     return $user->permiso_id == '1';
        // });

        Gate::define('borrado', function($user){
            return $user->permisos->contains('id', 3);
        });

    }
}
