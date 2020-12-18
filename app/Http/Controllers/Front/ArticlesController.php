<?php

namespace App\Http\Controllers\Front;

use App\Models\Article;
use App\Models\Category;
use App\Models\Method;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function view;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->published()->paginate(8);

        return view('app.articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
        $methods = Category::where('thread', 'directions')->where('published', 1)->inRandomOrder()->take(6)->get();

        return view('app.articles.show', compact('article', 'methods'));
    }
}
