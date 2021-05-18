@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-3">All Users</h2>
    @foreach ($listOfUser as $users)
        <div class="card mb-3" >
            <div class="row">
                <div class="col-2 profile-pic">
                    <img src="{{asset('img/profile.jpg')}}" >
                </div>
                <div class="col-md-10">
                    <div class="card-body my-3 d-flex justify-content-between align-content-center ">
                        <h2><a href="">{{$users->fname}}</a></h2>
                        @if (auth()->user()->is_following($users->id) || auth()->user()->id == $users->id)
                            <a href="{{ route('users.unfollow',['followed_id'=>$users->id]) }}" class="btn btn-danger"> Unfollow</a>
                        @else
                            <a href="{{ route('users.follow',['followed_id'=>$users->id]) }}" class="btn btn-primary"> Follow</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
