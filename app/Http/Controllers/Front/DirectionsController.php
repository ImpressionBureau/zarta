<?php

namespace App\Http\Controllers\Front;

use App\Models\Article;
use App\Models\Category;
use App\Models\Direction;
use App\Models\Method;
use App\Http\Controllers\Controller;

class DirectionsController extends Controller
{
    public function index(Category $item)
    {
        $methods = Category::where('thread', 'directions')->inRandomOrder()->take(6)->get();
        $category = $item;
        $articles = Direction::where('category_id', $category->id)->get();
        $article = $articles->first();
        return \view('app.directions.index', compact('category', 'articles', 'article', 'methods'));
    }

    public function show(Direction $item)
    {

        $article = $item;
        $category = Category::where('id', $article->category_id)->first();
        $methods = Category::where('thread', 'directions')->inRandomOrder()->take(6)->get();
        $articles = Direction::where('category_id', $category->id)->get();
        return \view('app.directions.index', compact('category', 'articles', 'article', 'methods'));
    }
}
