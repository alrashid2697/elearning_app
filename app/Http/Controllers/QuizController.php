<?php

namespace App\Http\Controllers;
use App\Questionnaire;
use App\Answer;
use App\Category;
use App\Lesson;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    //

    public function listCategory(Category $category)
    {
        $categories = $category->all();
        return view('/quiz.categorylist', compact('categories',$categories));

    }

    public function showLesson(Lesson $lesson, Category $category)
    {

        $questions = $lesson->category->questions()->paginate(1);

        return view('quiz.lessons', compact('questions','lesson'));
    }

    public function storeLesson(Request $request)
    {

        $lesson = Lesson::create([
            'category_id' => $request->category_id,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('lesson.show', ['lesson' => $lesson]);
    }

    public function answerLesson(Request $request, Lesson $lesson)
    {

       Answer::create([
            'quiz_id' => $request->quiz_id,
            'lesson_id' => $lesson->id,
            'ur_answer' => $request->answer_choice
            ]);

        if($request->currentPage >= $request->lastPage)
        {

            return view('quiz.results',compact('lesson', $lesson));
        }

        return redirect($request->nextPageUrl);
    }



}
