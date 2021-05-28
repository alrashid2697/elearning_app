@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-3">People who are following <a href="{{url('/profile/'.$user->id)}}"> {{$user->fname}} </a>. </h2>
    @foreach ($follower as $users)
    <div class="card mb-3" >
        <div class="row">
            <div class="col-2 profile-pic">
                <img src="{{asset('img/profile.jpg')}}" >
            </div>
            <div class="col-md-10">
                <div class="card-body my-3 d-flex justify-content-between align-content-center ">
                    <h2><a href="{{url('/profile/'.$users->id)}}">{{$users->fname}}</a></h2>
                    @if (auth()->user()->id != $users->id)
                        @if (auth()->user()->is_following($users->id) || auth()->user()->id == $users->id)
                        <form action="{{ route('users.unfollow',['followed_id'=>$users->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit"> Unfollow</button>
                        </form>
                        @else
                        <form action="{{ route('users.follow',['followed_id'=>$users->id]) }}" method="POST">
                            @csrf
                            <button class="btn btn-primary" type="submit"> Follow</button>
                        </form>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
@endforeach
</div>
@endsection
