
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-3">Categories</h1>
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-md-6 mb-3 d-flex-wrap">
                        <div class="card shadow">
                            <div class="card-body">
                            <h5 class="card-title">{{$category->title}}</h5>
                            <p class="card-text">{{$category->description}}</p>
                            <form action="/lessons" method="POST">
                                @csrf
                                <input type="hidden" name="category_id" value="{{$category->id}}">
                                <button type="submit" class="btn btn-primary float-right">
                                    Take Quiz
                                </button>
                            </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
</div>
@endsection

