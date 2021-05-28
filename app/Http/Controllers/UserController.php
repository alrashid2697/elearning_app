<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Activity;
use App\Follow;
use App\Lesson;




class UserController extends Controller
{
    public function index()
    {
        return view('/home');
    }


    public function listOfUsers()
    {
        $listOfUser = User::where('id', '!=', auth()->id())->get();
        return view('/users', compact('listOfUser',$listOfUser));
    }

    public function follow($follow_id)
    {

        $followed_user = User::find($follow_id);
        auth()->user()->following()->attach($followed_user);
        $follow = Follow::where('follower_id', auth()->user()->id)->where('followed_id', $followed_user->id)->first();

       $activity = $follow->activity()->create([
           'user_id' => auth()->user()->id,
       ]);
        return back();

    }

    public function unfollow($follow_id)
    {
        $followed_user = User::find($follow_id);
        $follow = Follow::where('follower_id', auth()->user()->id)->where('followed_id', $followed_user->id)->first();
        auth()->user()->following()->detach($followed_user);
        $activity = $follow->activity()->delete();
        return redirect()->back();
    }


    public function profile( User $users, Lesson $lesson)
    {

        $following = $users->following()->get();
        $followers = $users->followers()->get();

        $activities = Activity::orderBy('updated_at','DESC')->where('user_id', auth()->user()->id)->with('follow','follow.followUser','answer','answer.lesson','answer.lesson.category')->get();
        $activitiesOtherUser = Activity::orderBy('updated_at','DESC')->where('user_id', $users->id)->with('follow','follow.followUser','answer','answer.lesson','answer.lesson.category')->get();

        return view('/profile',compact('users','following','followers','activities','activitiesOtherUser','lesson',$users, $following, $followers, $activitiesOtherUser ,$activities, $lesson));
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
