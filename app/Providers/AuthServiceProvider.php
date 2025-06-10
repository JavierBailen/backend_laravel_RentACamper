<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Las políticas de autenticación para tu aplicación.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Registra cualquier servicio de autenticación / autorización.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Passport::routes(); // ← Añade esto para registrar las rutas de Passport
    }
}
