<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Autorización para acceder a Administración de usuarios
        Gate::define('administrar-users', function($user){
            return $user->hasRol('adminA');
        });

        // Autorización para acceder a Administración de archivos de usuarios
        Gate::define('admin-files-users', function($user){
            return $user->hasRol('adminB');
        });

        // Autorización para acceder a Administración de archivos de usuarios
        Gate::define('files-users', function($user){
            return $user->hasRol('user');
        });

        // Autorización para editar usuarios al admin
        Gate::define('editar-users', function($user){
            return $user->hasRol('adminA');
        });

        // Autorización para editar usuarios al admin
        Gate::define('eliminar-users', function($user){
            return $user->hasRol('adminA');
        });

        //
    }
}
