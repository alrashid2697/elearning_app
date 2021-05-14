@extends('layouts.app')

@section('content')
<div class="container">
      <div class="card">
        <div class="card-header">
          Create Category
        </div>
        <div class="card-body">
            <form action="/admin" method="POST">
                @csrf
                <div class="form-group">
                  <label >Title</label>
                  <input type="text" class="form-control" id="" placeholder="" name="title">
                </div>
                <div class="form-group">
                  <label >Description</label>
                  <textarea class="form-control" id="Description" rows="3" name="description"></textarea>
                </div>
                <div class="form-group mr-auto">
                    <button type="submit" class="btn btn-primary ">Create</button>
                    <a href="{{ url('/admin')}}" class="btn btn-secondary my-3" role="button"> Cancel</a>
                </div>
              </form>

        </div>
      </div>
</div>
@endsection
