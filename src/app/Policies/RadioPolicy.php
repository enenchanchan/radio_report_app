<?php

namespace App\Policies;

use App\Models\Radio;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RadioPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(?User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Radio  $radio
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(?User $user, Radio $radio)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Radio  $radio
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Radio $radio)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Radio  $radio
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Radio $radio)
    {
        return $user->role = 100;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Radio  $radio
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Radio $radio)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Radio  $radio
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Radio $radio)
    {
        //
    }
}
