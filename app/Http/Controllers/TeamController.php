<?php

namespace App\Http\Controllers;

use App\Model\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $user = auth()->User();
        $this->authorize('godView', $user);
        $team = Team::all();
        return $team;
    }

    public function store(Request $request)
    {
        $this->authorize('create',Team::class);
        $team = new Team([
            'title'=> $request->title,
            'lead_id'=> $request->lead_id
        ]);
        $team->save();
        return 'success';
    }

    public function show(Team $team)
    {
        // $team = Team::where('id', $id)->first();
        $this->authorize('view',$team);
        dd("kjj");
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
        $user = auth()->User();
        $this->authorize('godView', $user);
        $team->delete();
    }
    public function showMembers(Team $team){

        $user = auth()->User();
        $this->authorize('view', $user);
        $members = $team->users;
        return $members;
    }
}
