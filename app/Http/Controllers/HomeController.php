<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $activities = Activity::where('user_id', auth()->user()->id)->with('follow','follow.followUser','answer','answer.lesson','answer.lesson.category')->get();
        // $follow = Activity::where('user_id', auth()->user()->id)->with('follow','follow.followUser')->get();

        // $activities = auth()->user()->activities;


        // foreach($activities as $activity)
        // {
        //     dd($activity->answer);
        // }
        
        return view('home',compact('activities'));
    }
}
