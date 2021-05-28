@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mx-auto">
        <div class="col-md-4 ">
            <h2 class="font-weight-light mb-3">Dashboard</h2>
            <div class="d-flex justify-content-center align-content-center">
                <div class="profile-pic">
                    <img src="{{asset('img/profile.jpg')}}" alt="" >
                </div>
                <div class="text ml-4">
                    <h4 class="font-weight-light"> {{Auth::user()->fname}} {{Auth::user()->lname}}</h4>
                    <p class="text-primary"> Learned # Words <br> Learned  # Lessons </p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="container">
                <div class="card px-3">
                    <div class="border-bottom">
                      <h2 class="font-weight-light py-3">Activities</h2>
                    </div>
                    <div class="card-body">


                        <div class="d-flex my-2">
                            <div class="profile">
                                <img src="{{asset('img/profile.jpg')}}" alt="" >
                            </div>
                            <div class="text ml-3">
                                <h4 class="font-weight-light"> You took Nihongo 101 </h4>
                                <p>14 minutes ago </p>
                            </div>
                        </div>

                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
