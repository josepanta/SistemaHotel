<?php

namespace App\Policies;

use App\Models\TipoReserva;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TipoReservaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        if($user->hasRole('admin')){
            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TipoReserva  $tipoReserva
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, TipoReserva $tipoReserva)
    {
        if($user->hasRole('admin')){
            return true;
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        if($user->hasRole('admin')){
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TipoReserva  $tipoReserva
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, TipoReserva $tipoReserva)
    {
        if($user->hasRole('admin')){
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TipoReserva  $tipoReserva
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, TipoReserva $tipoReserva)
    {
        if($user->hasRole('admin')){
            return true;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TipoReserva  $tipoReserva
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, TipoReserva $tipoReserva)
    {

    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TipoReserva  $tipoReserva
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, TipoReserva $tipoReserva)
    {

    }
}
