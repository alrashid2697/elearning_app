
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
          <h2>{{$lesson->category->title}}</h2>
          <p>{{$lesson->category->description}}</p>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Status</th>
                    <th scope="col">Question</th>
                    <th scope="col">Your Answer	</th>
                    <th scope="col">Correct Answer</th>
                </tr>
                </thead>
            <tbody>
                @foreach ($lesson->answers as $results)
                    <tr>
                        @foreach ($results->questionnaire as $result)
                            @if ($results->ur_answer == $result->answer)
                                <td> <p class="text-success">Correct</p></td>
                            @else
                                <td> <p class="text-danger">Wrong</p></td>
                            @endif

                                <td>{{$result->question}}</td>

                            @if ($results->ur_answer == 1)
                                <td> {{$result->choice_1}} </td>
                            @elseif($results->ur_answer == 2)
                                <td> {{$result->choice_2}} </td>
                            @elseif($results->ur_answer == 3)
                                <td> {{$result->choice_3}} </td>
                            @elseif($results->ur_answer == 4)
                                <td> {{$result->choice_4}} </td>
                            @endif

                            @if ($result->answer == 1)
                                <td> {{$result->choice_1}} </td>
                            @elseif($result->answer == 2)
                                <td> {{$result->choice_2}} </td>
                            @elseif($result->answer == 3)
                                <td> {{$result->choice_3}} </td>
                            @elseif($result->answer == 4)
                                <td> {{$result->choice_4}} </td>
                            @endif
                         @endforeach
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
    </div>
</div>
@endsection

