@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-12">
            <h1>Admin Dashboard | Category</h1>
            <ul class="list-inline border-bottom my-3 py-2">
                <li class="list-inline-item"><a href="{{url('/admin')}}" class="text-decoration-none">Catergory</a></li>
                <li class="list-inline-item ml-4"><a href="{{url('/admin/listuser')}}" class="text-decoration-none">Users</a></li>
              </ul>
            <div class="card shadow mb-3 mx-auto" style="max-width:25rem;">
                <div class="card-body">
                  <h5 class="card-title">Title: {{$category->title}}</h5>
                  <p class="card-text">Description: {{$category->description}}</p>
            </div>
        </div>
            @if (Session::has('success'))
                <div class="col-md-12 alert alert-success mt-5 text-center text-uppercase my-3" role="alert" >
                    <strong><p>{{ Session::get('success')}} </p></strong>
                </div>
            @endif
        <div class="col-md-12">
            <a href="{{url('/admin/'.$category->id.'/infocategory/questionnaire')}}" class="btn btn-primary float-right my-2" role="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg> Add Questionnaire
            </a>

            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Question</th>
                    <th scope="col" >Choices</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($category->questions as $quiz )
                        <tr>
                            <td>{{$quiz->id}}</td>
                            <td>{{$quiz->question}}</td>
                            <td>
                                <div class="d-inline-flex">
                                    @if ($quiz->answer == 1)
                                    <div class="mr-4 text-success">{{$quiz->choice_1}}</div>
                                    @else
                                    <div class="mr-4">{{$quiz->choice_1}}</div>
                                    @endif

                                    @if ($quiz->answer == 2)
                                    <div class="mr-4 text-success">{{$quiz->choice_2}}</div>
                                    @else
                                    <div class="mr-4">{{$quiz->choice_2}}</div>
                                    @endif

                                    @if ($quiz->answer == 3)
                                    <div class="mr-4 text-success">{{$quiz->choice_3}}</div>
                                    @else
                                    <div class="mr-4">{{$quiz->choice_3}}</div>
                                    @endif

                                    @if ($quiz->answer == 4)
                                    <div class="mr-4 text-success">{{$quiz->choice_4}}</div>
                                    @else
                                    <div class="mr-4">{{$quiz->choice_4}}</div>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a href="{{url('/admin/'.$category->id.'/'.$quiz->id.'/editquiz')}}" class="btn btn-warning"  role="button"><i class="bi bi-pencil-square"></i> </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <form action="/admin/{{$category->id}}/infocategory/{{$quiz->id}}" method="post">
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
