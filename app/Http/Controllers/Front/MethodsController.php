<?php

namespace App\Http\Controllers\Front;

use App\Models\Category;
use App\Models\Method;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function view;

class MethodsController extends Controller
{
    public function index()
    {
        $category = Category::where('thread', 'methods')->has('methods')->first();
        $articles = Method::where('category_id', $category->id)->get();
        $article = $articles->first();

        return view('app.methods.index', compact('category', 'articles', 'article'));
    }

    public function show(Method $method)
    {
        return view('app.methods.index', compact('method'));
    }
}
