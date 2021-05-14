@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-12">
            <h1>Admin Dashboard</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item "><a href="#" class="text-decoration-none">Catergory</a></li>
                  <li class="breadcrumb-item "><a href="#" class="text-decoration-none">Users</a></li>
                </ol>
              </nav>
        </div>

        @if (Session::has('success'))
            <div class="col-md-12 alert alert-success mt-5 text-center text-uppercase" role="alert" >
                <strong><p>{{ Session::get('success')}} </p></strong>
            </div>
        @endif

        <div class="col-md-12">
            <a href="{{url('/admin/createcategory')}}" class="btn btn-success my-2 mr-auto" role="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg> Add Category
            </a>

            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td> {{$category->id}}</td>
                            <td> <a href="{{url('/admin/' . $category->id . '/infocategory')}}"> {{$category->title}} </a></td>
                            <td> {{$category->description}}</td>
                            <td>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a href="{{url('/admin/' . $category->id . '/editcategory')}}" class="btn btn-warning"  role="button"><i class="bi bi-pencil-square"></i> </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <form action="/admin/{{$category->id}}" method="post">
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
