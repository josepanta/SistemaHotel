<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Spatie\Permission\Models\Role;

use App\Models\Habitacione;
use App\Models\Reserva;
use App\Models\TipoHabitacione;
use App\Models\TipoReserva;
use App\Models\User;
use App\Policies\HabitacionePolicy;
use App\Policies\ReservaPolicy;
use App\Policies\RolePolicy;
use App\Policies\TipoHabitacionePolicy;
use App\Policies\TipoReservaPolicy;
use App\Policies\UserPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Role::class => RolePolicy::class,
        Habitacione::class => HabitacionePolicy::class,
        Reserva::class => ReservaPolicy::class,
        TipoHabitacione::class => TipoHabitacionePolicy::class,
        TipoReserva::class => TipoReservaPolicy::class,
        User::class => UserPolicy::class

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
