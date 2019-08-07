<?php

namespace App\Http\Controllers;

use App\Model\Project;
use App\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $user = auth()->User();
        if($user->role==3)
        {
            $project = Project::all();
            return $project;
        }else{
            return "You are not god";
        }
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

    public function show(Project $project)
    {
        return $project;

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
    public function addMember(Request $request, Project $project){
        // $members = $project->users;
        // return $members;
        $users = User::find($request->user_id);
        $project->users()->attach($users);
        return 'success'; 
    }
    public function showMembers($project_id){
        $users = User::where('project_id', $project_id)->get();
        return $users;
    }
}
