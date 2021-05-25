<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;
use App\Answerkey;
use App\Category;


class QuestionnaireController extends Controller
{
    //

    public function show(Category $category)
    {

       return view('admin.questionnaire', compact('category', $category));

    }

    public function storeQuiz(Request $request, Category $category)
    {

        Questionnaire::create([
            'question' => $request->question,
            'category_id' => $category->id,
            'choice_1' => $request->choice_1,
            'choice_2' => $request->choice_2,
            'choice_3' => $request->choice_3,
            'choice_4' => $request->choice_4,
            'answer' => $request->answer,

        ]);
        return redirect('/admin/'.$category->id.'/infocategory')->with('success', 'New Questionnaire was Created');

    }

    public function editQuiz($id, Questionnaire $questionnaire)
    {
       $category = Category::with(['questions'])->where('id', '=', $id)->first();

        return view('admin.editquiz', compact('questionnaire','category'));
    }

    public function updateQuiz(Request $request, Category $category, Questionnaire $questionnaire)
    {
        $questionnaire->update([
            'question' => $request->question,
            'choice_1' => $request->choice_1,
            'choice_2' => $request->choice_2,
            'choice_3' => $request->choice_3,
            'choice_4' => $request->choice_4,
            'answer' => $request->answer
        ]);

        // dd($quiz);
        return redirect('/admin/'.$category->id.'/infocategory')->with('success', 'Questionnaire was Updated');
    }

    public function destroyQuiz(Category $category, Questionnaire $questionnaire)
    {

        $questionnaire->delete();

        return redirect('/admin/'.$category->id.'/infocategory')->with('success', 'Questionnaire was Deleted');


    }

}
