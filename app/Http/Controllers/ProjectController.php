<?php

namespace App\Http\Controllers;

use App\Model\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // TODO: make it God level
    public function index()
    {
        $project = Project::all();
        return $project;
    }

    public function store(Request $request)
    {
        $project = new Project([
            'title'=> $request->title,
            'details' => $request->details,
            'lead_id'=> $request->lead_id
        ]);
        $project->save();
    }

    //TODO: make it member-level
    public function show(Project $project)
    {
        // return $project;
        $users = User::find($project->id);
        $project->users()->attach($users);
        return 'success'; 
    }



    public function update(Request $request, Project $project)
    {
        $project->title = $request->title;
        $project->lead_id = $request->lead_id;
        $project->details = $request->details;
    }

    /// TODO: make it God level
    public function destroy(Project $project)
    {
        $project->delete();
    }
    public function showMembers(Project $project){
        $members = $project->users;
        return $members;
    }
}
