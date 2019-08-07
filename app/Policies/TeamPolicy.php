<?php

namespace App\Policies;

use App\User;
use App\Team;
use Illuminate\Auth\Access\HandlesAuthorization;

class TeamPolicy
{
    use HandlesAuthorization;
    
    public function view(User $user, Team $team)
    {
        dd('hello');
        return $user->team_id == $team->id;
        // dd($user);
    }
    
    public function create(User $user)
    {
        // dd($user);
        return $user->role ==3;
    }

    public function update(User $user, Team $team)
    {
        return $user->id == $team->lead_id;
    }

    public function delete(User $user, Team $team)
    {
        return $user->role ==3;
    }
    public function godView(User $user){
        return $user->role ==3;
    }

}
