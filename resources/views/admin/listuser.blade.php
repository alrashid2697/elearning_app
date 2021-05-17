@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-12 mb-2">
            <h1>Admin Dashboard | List of Users</h1>

            <ul class="list-inline border-bottom py-2">
                <li class="list-inline-item"><a href="{{url('/admin')}}" class="text-decoration-none">Catergory</a></li>
                <li class="list-inline-item ml-4"><a href="{{url('/admin/listuser')}}" class="text-decoration-none">Users</a></li>
              </ul>
        </div>

        @if (Session::has('success'))
            <div class="col-md-12 alert alert-success mt-5 text-center text-uppercase" role="alert" >
                <strong><p>{{ Session::get('success')}} </p></strong>
            </div>
        @endif

        <div class="col-md-12">
            <a href="{{url('/admin/adduser')}}" class="btn btn-success my-2 mr-auto float-right" role="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg> Add User
            </a>

            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->fname}} {{$user->lname}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a href="{{url('/admin/'.$user->id.'/edituser')}}" class="btn btn-warning"  role="button"><i class="bi bi-pencil-square"></i> </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <form action="/admin/listuser/{{$user->id}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button  class ="btn btn-danger">
                                            <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                     @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
