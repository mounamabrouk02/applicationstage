<?php

namespace App\Policies;

use App\Publication;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PublicationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Publication  $publication
     * @return mixed
     */
    public function view(User $user, Publication $publication)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
       return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Publication  $publication
     * @return mixed
     */
    public function update(User $user, Publication $publication)
    {
        return $user->id === $publication->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Publication  $publication
     * @return mixed
     */
    public function delete(User $user, Publication $publication)
    {
        return $user->id === $publication->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Publication  $publication
     * @return mixed
     */
    public function restore(User $user, Publication $publication)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Publication  $publication
     * @return mixed
     */
    public function forceDelete(User $user, Publication $publication)
    {
        //
    }
}
