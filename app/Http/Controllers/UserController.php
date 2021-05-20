<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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


    public function profile(User $users)
    {
        $following = $users->following()->get();
        $followers = $users->followers()->get();

        return view('/profile',compact('users','following','followers',$users, $following, $followers));
    }

    public function following($id)
    {
        $user = User::find($id);
        $following = $user->following()->get();

        return view('following', compact('following','user'));

    }
    public function followers($id)
    {
        $user = User::find($id);
        $follower = $user->followers()->get();

        return view('followers', compact('follower','user'));
    }

    public function editProfile(User $user)
    {
       return view('/user/editprofile', compact('user'));

    }
    public function updateProfile(Request $request, User $user)
    {

        if(auth()->user()->role == 0 || auth()->user()->role == null)
        {
            $user->update([
                'fname'=> $request->fname,
                'lname'=> $request->lname,
                'email'=> $request->email,
                'role'=> 0,
                'password' => Hash::make($request->password),
            ]);
        }
        else {
            $user->update([
                'fname'=> $request->fname,
                'lname'=> $request->lname,
                'email'=> $request->email,
                'role'=> 1,
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect('/profile/'.$user->id)->with('success', 'Profile was Updated');

    }

}
