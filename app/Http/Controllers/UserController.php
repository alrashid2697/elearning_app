<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        return view('/user.index');
    }

    public function listOfUsers()
    {
        $listOfUser = User::where('id', '!=', auth()->id())->get();
        return view('/users', compact('listOfUser',$listOfUser));
    }

    public function follow($id)
    {
        $followed_user = User::find($id);
        auth()->user()->following()->attach($followed_user);
        return back();

    }

    public function unfollow($id)
    {
        $followed_user = User::find($id);
        auth()->user()->following()->detach($followed_user);
        return redirect()->back();
    }

}
