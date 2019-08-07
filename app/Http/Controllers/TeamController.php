<?php

namespace App\Http\Controllers;

use App\Model\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $user = auth()->User();
        if($user->role==3)
        {
            $team = Team::all();
            return $team;
        }else{
            return "You are not god";
        }
    }

    public function store(Request $request)
    {
        $team = new Team([
            'title'=> $request->title,
            'lead_id'=> $request->lead_id
        ]);
        $team->save();
    }

    //TODO: make it member-level
    public function show(Team $team)
    {
        return $team;
    }

    //TODO: edit team-members.
    //      ------> send invites/deletion message
    public function update(Request $request, Team $team)
    {
        $employee->title = $request->title;
        $employee->lead_id = $request->lead_id;
    }
    // TODO: make it God level
    public function destroy(Team $team)
    {
        $team->delete();
    }
    public function showMembers(Team $team){
        $members = $team->users;
        return $members;
    }
}
