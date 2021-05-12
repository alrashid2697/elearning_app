@extends('layouts.app')

@section('content')
<div class="container">
    <form action="" method="POST">
        @csrf
        <div class="form-group">
          <label >Title</label>
          <input type="text" class="form-control" id="" placeholder="" name="title">
        </div>
        <div class="form-group">
          <label >Description</label>
          <textarea class="form-control" id="Description" rows="3" name="description"></textarea>
        </div>
      </form>
</div>
@endsection
