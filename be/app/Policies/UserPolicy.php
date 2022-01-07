<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any users.
     *
     * @param  App\User  $user
     * @return mixed
     */
    public function laAdmin(User $user)
    {
        return $user->staff == 1;
    }

    /**
     * Determine whether the user can view the user.
     *
     * @param  App\User  $user
     * @param  App\User  $user
     * @return mixed
     */
    public function view(User $user, User $otherUser)
    {
        return $user->id === $otherUser->id or $user->staff === true;
    }

    /**
     * Determine whether the user can create users.
     *
     * @param  App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->staff === true;
    }

    /**
     * Determine whether the user can update the user.
     *
     * @param  App\User  $user
     * @param  App\User  $user
     * @return mixed
     */
    public function update(User $user, User $otherUser)
    {
        return $user->id === $otherUser->id or $user->staff === true;
    }

    /**
     * Determine whether the user can delete the user.
     *
     * @param  App\User  $user
     * @param  App\User  $user
     * @return mixed
     */
    public function delete(User $user, User $otherUser)
    {
        return $user->staff === true or $user->id === $otherUser->id;
    }
}
