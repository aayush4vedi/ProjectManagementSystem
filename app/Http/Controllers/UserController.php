<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //1.only for god to see
    public function index()
    {
        $user = auth()->User();
        if($user->role==3)
        {
            $user = User::all();
        }
        return $user;
    }
    
    //2.only for god to see
    public function destroy($user)
    {
        $user = auth()->User();
        if($user->role==3)
        {
            $user->delete();
        }
    }
    // TODO: make it God-level
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'password' => 'required|min:2',
            'email' => 'required|email',
            'role' => 'required'
        ]);
        $user = new User();
        $user->name = request('name');
        $user->password = bcrypt(request('password'));
        $user->email = request('email');
        $user->role = request('role');
        $user->project_id;
        $user->team_id;
        $user->contact = request('contact');
        $user->gender = request('gender');
        $user->save();
        return 'User Created!';
    }

    public function show(User $user)
    {
        $this->authorize('view',$user);
        return $user;
    }
    public function update(Request $request,User $user)
    {
        $user->name = $request->name;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->contact = $request->contact;
        $user->gender = $request->gender;
        $user->password = $request->password;
        $user->save();
    }

}
