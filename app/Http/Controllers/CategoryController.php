<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Questionnaire;
use App\Category;

class CategoryController extends Controller
{
    //

    public function create()
    {
       return view('admin.createcategory');

    }
    public function store(Request $request)
    {

        Category::create([
            'title'=> $request->title,
            'description' => $request->description,
        ]);
            return redirect('/admin')->with('success', 'New Category was Created');


    }

    public function show($id)
    {

       $category = Category::with(['questions'])->where('id', '=', $id)->first();

       return view('/admin/infocategory', compact('category'));

    }

    public function edit(Category $category)
    {

       return view('/admin/editcategory', compact('category'));

    }

    public function update(Request $request, Category $category)
    {
        $category->update([
            'title'=> $request->title,
            'description' => $request->description,
        ]);
            return redirect('/admin')->with('success', 'Category was Updated');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect('/admin')->with('success', 'Category was Deleted');
    }
}
