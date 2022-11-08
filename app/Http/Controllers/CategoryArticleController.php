<?php

namespace App\Http\Controllers;

// use App\Http\Requests\CategoryArticleRequest;
use App\Http\Requests\CategoryArticleRequest;
// use Illuminate\Http\Request;
use App\Models\CategoryArticle;

class CategoryArticleController extends Controller
{

    public function index()
    {
        return view('category.index', [
            'category_articles' => CategoryArticle::all()
        ]);
    }

    // insert data
    public function store(CategoryArticleRequest $request)
    {
     CategoryArticle::create($request->all());
     return back()->with('success', 'Category Article'.$request->name.' has been created');
 }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required'
    //     ]);

    //     CategoryArticle::create($request->all());
    //     return back()->with('success', 'Category Article'.$request->name.' has been created');
    // }
}
