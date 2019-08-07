<?php

namespace App\Policies;

use App\User;
use App\Invite;
use Illuminate\Auth\Access\HandlesAuthorization;

class InvitePolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any invites.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the invite.
     *
     * @param  \App\User  $user
     * @param  \App\Invite  $invite
     * @return mixed
     */
    public function view(User $user, Invite $invite)
    {
        //
    }

    /**
     * Determine whether the user can create invites.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the invite.
     *
     * @param  \App\User  $user
     * @param  \App\Invite  $invite
     * @return mixed
     */
    public function update(User $user, Invite $invite)
    {
        //
    }

    /**
     * Determine whether the user can delete the invite.
     *
     * @param  \App\User  $user
     * @param  \App\Invite  $invite
     * @return mixed
     */
    public function delete(User $user, Invite $invite)
    {
        //
    }

    /**
     * Determine whether the user can restore the invite.
     *
     * @param  \App\User  $user
     * @param  \App\Invite  $invite
     * @return mixed
     */
    public function restore(User $user, Invite $invite)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the invite.
     *
     * @param  \App\User  $user
     * @param  \App\Invite  $invite
     * @return mixed
     */
    public function forceDelete(User $user, Invite $invite)
    {
        //
    }
}
