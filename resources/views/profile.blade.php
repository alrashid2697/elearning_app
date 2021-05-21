@extends('layouts.app')

@section('content')
<div class="container">

<div class="row">
    @if (Session::has('success'))
    <div class="col-md-12 alert alert-success mt-5 text-center text-uppercase" role="alert" >
        <strong><p>{{ Session::get('success')}} </p></strong>
    </div>
    @endif
    <div class="col-md-4">
        <div class="card shadow">
            <img src="{{asset('img/profile.jpg')}}" class="card-img-top" alt="...">
            <div class="card-body my-4">
              <h5 class="card-title border-bottom mb-2 text-center">{{$users->fname}} {{$users->lname}}</h5>
              <div class=" my-2 linkers d-flex justify-content-around align-content-center text-center">
                <a href="{{url('/users/followers/'. $users->id )}}" class="text-decoration-none"> {{$followers->count()}} </br> Follower </a>
                <a href="{{url('/users/following/'.$users->id)}}" class="text-decoration-none"> {{$following->count()}} </br> Following </a>
              </div>
                @if (auth()->user()->id != $users->id)
                    @if (auth()->user()->is_following($users->id) || auth()->user()->id == $users->id)
                        <a href="{{ route('users.unfollow',['followed_id'=>$users->id]) }}" class="btn btn-danger w-100"> Unfollow</a>
                    @else
                        <a href="{{ route('users.follow',['followed_id'=>$users->id]) }}" class="btn btn-primary w-100"> Follow</a>
                    @endif
                @else
                    <a href="{{url('/users/' .auth()->user()->id . '/editprofile')}}" class="btn btn-primary w-100"  role="button">Edit Profile</a>
                @endif
            </div>
            <p class="text-center">Learned 0 Words</p>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-body">
                <h1 class="card-title border-bottom">Activities </h1>
            </div>
    </div>
</div>


</div>
@endsection
