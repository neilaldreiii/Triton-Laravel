<?php

namespace App\Policies;

use App\User;
use App\Athletes;
use Illuminate\Auth\Access\HandlesAuthorization;

class AthletePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the athletes.
     *
     * @param  \App\User  $user
     * @param  \App\Athletes  $athletes
     * @return mixed
     */
    public function view(User $user, Athletes $athletes)
    {
        //
    }

    /**
     * Determine whether the user can create athletes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the athletes.
     *
     * @param  \App\User  $user
     * @param  \App\Athletes  $athletes
     * @return mixed
     */
    public function update(?User $user, Athletes $athletes)
    {
        // return $athletes->owner_id == $user->id;
    }

    /**
     * Determine whether the user can delete the athletes.
     *
     * @param  \App\User  $user
     * @param  \App\Athletes  $athletes
     * @return mixed
     */
    public function delete(User $user, Athletes $athletes)
    {
        //
    }

    /**
     * Determine whether the user can restore the athletes.
     *
     * @param  \App\User  $user
     * @param  \App\Athletes  $athletes
     * @return mixed
     */
    public function restore(User $user, Athletes $athletes)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the athletes.
     *
     * @param  \App\User  $user
     * @param  \App\Athletes  $athletes
     * @return mixed
     */
    public function forceDelete(User $user, Athletes $athletes)
    {
        //
    }
}
