<?php

namespace App\Policies;

use App\Models\Character;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CharacterPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user): \Illuminate\Auth\Access\Response|bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Character $character): \Illuminate\Auth\Access\Response|bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user): \Illuminate\Auth\Access\Response|bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Character $character): \Illuminate\Auth\Access\Response|bool
    {
        dd('Stop here');
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Character $character): \Illuminate\Auth\Access\Response|bool
    {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Character $character): \Illuminate\Auth\Access\Response|bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Character $character): \Illuminate\Auth\Access\Response|bool
    {
        return true;
    }
}
