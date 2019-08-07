<?php

namespace App\Http\Controllers;

use App\Model\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    // TODO: make it God level
    public function index()
    {
        $team = Team::all();
        return $team;
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
}
