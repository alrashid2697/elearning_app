
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="text-title d-flex justify-content-between">
                <h2>{{$lesson->category->title}} </h2>
                <h2 class="text-right"> {{$questions->currentPage()}} / {{$questions->lastPage() }} </h2>
            </div>
            <div class="card shadow">
                <div class="card-body">
                  @foreach ($questions as $question)
                  <h2 class="card-title text-center">{{$question->question}}</h2>
                    <form action="{{route('lesson.answer', ['lesson'=>$lesson])}}" method="post">
                        @csrf
                        <input type="hidden" name="quiz_id" value="{{$question->id}}">
                        <input type="hidden" name="currentPage" value="{{$questions->currentPage()}}">
                        <input type="hidden" name="lastPage" value="{{$questions->lastPage()}}">
                        <input type="hidden" name="answer_choice" value="1">
                        <input type="hidden" name="nextPageUrl" value="{{$questions->nextPageUrl()}}">
                        <button  class ="btn btn-primary w-100 mb-2">
                            {{$question->choice_1}}
                        </button>
                    </form>
                    <form action="{{route('lesson.answer', ['lesson'=>$lesson])}}" method="post">
                        @csrf
                        <input type="hidden" name="quiz_id" value="{{$question->id}}">
                        <input type="hidden" name="currentPage" value="{{$questions->currentPage()}}">
                        <input type="hidden" name="lastPage" value="{{$questions->lastPage()}}">
                        <input type="hidden" name="answer_choice" value="2">
                        <input type="hidden" name="nextPageUrl" value="{{$questions->nextPageUrl()}}">
                        <button  class ="btn btn-primary w-100 mb-2">
                            {{$question->choice_2}}
                        </button>
                    </form>
                    <form action="{{route('lesson.answer', ['lesson'=>$lesson])}}" method="post">
                        @csrf
                        <input type="hidden" name="quiz_id" value="{{$question->id}}">
                        <input type="hidden" name="currentPage" value="{{$questions->currentPage()}}">
                        <input type="hidden" name="lastPage" value="{{$questions->lastPage()}}">
                        <input type="hidden" name="answer_choice" value="3">
                        <input type="hidden" name="nextPageUrl" value="{{$questions->nextPageUrl()}}">
                        <button  class ="btn btn-primary w-100 mb-2">
                            {{$question->choice_3}}
                        </button>
                    </form>
                    <form action="{{route('lesson.answer', ['lesson'=>$lesson])}}" method="post">
                        @csrf
                        <input type="hidden" name="quiz_id" value="{{$question->id}}">
                        <input type="hidden" name="currentPage" value="{{$questions->currentPage()}}">
                        <input type="hidden" name="lastPage" value="{{$questions->lastPage()}}">
                        <input type="hidden" name="answer_choice" value="4">
                        <input type="hidden" name="nextPageUrl" value="{{$questions->nextPageUrl()}}">
                        <button  class ="btn btn-primary w-100 mb-2">
                            {{$question->choice_4}}
                        </button>
                    </form>
                @endforeach
                </div>
              </div>
        </div>
    </div>
</div>
@endsection

