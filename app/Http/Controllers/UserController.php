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
    public function store(Request $request)
    {
        //no need, as /register exists
    }

    public function show($user)
    {
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
