@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow" >
        <div class="card-body">
          <h2 class="card-title">Edit Question</h2>
          <form action="/admin/{{$category->id}}/infocategory/edit" method="POST">
              @csrf
              @method('PATCH')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Question Text</label>
                            <input type="text" class="form-control" id="question" name="question" value="{{$quiz->question}}" >
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Choice 1</label>
                            <input type="text" class="form-control" id="choice_1" name="choice_1" value="{{$quiz->choice_1}}" >
                            @if ($quiz->answer == 1)
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" name="answer"  value="1" checked>
                                <label class="form-radio-label" >
                                 Correct Answer
                                </label>
                              </div>
                            @else
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" name="answer"  value="1">
                                <label class="form-radio-label" >
                                 Correct Answer
                                </label>
                              </div>

                            @endif

                         </div>
                         <div class="form-group">
                            <label>Choice 2</label>
                            <input type="text" class="form-control" id="choice_2" name="choice_2" value="{{$quiz->choice_2}}" >
                            @if ($quiz->answer == 2)
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" name="answer"  value="2" checked>
                                <label class="form-radio-label" >
                                 Correct Answer
                                </label>
                              </div>
                            @else
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" name="answer"  value="2">
                                <label class="form-radio-label" >
                                 Correct Answer
                                </label>
                              </div>

                            @endif

                         </div>
                         <div class="form-group">
                            <label>Choice 3</label>
                            <input type="text" class="form-control" id="choice_3" name="choice_3" value="{{$quiz->choice_3}}" >
                            @if ($quiz->answer == 3)
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" name="answer"  value="3" checked>
                                <label class="form-radio-label" >
                                 Correct Answer
                                </label>
                              </div>
                            @else
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" name="answer"  value="3">
                                <label class="form-radio-label" >
                                 Correct Answer
                                </label>
                              </div>

                            @endif

                         </div>
                         <div class="form-group">
                            <label>Choice 4</label>
                            <input type="text" class="form-control" id="choice_4" name="choice_4" value="{{$quiz->choice_4}}" >
                            @if ($quiz->answer == 4)
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" name="answer"  value="4" checked>
                                <label class="form-radio-label" >
                                 Correct Answer
                                </label>
                              </div>
                            @else
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" name="answer"  value="4">
                                <label class="form-radio-label" >
                                 Correct Answer
                                </label>
                              </div>

                            @endif
                              <button type="submit" class="btn btn-primary float-right">Update Question</button>
                         </div>
                    </div>
                </div>
          </form>
        </div>
      </div>
</div>
@endsection
