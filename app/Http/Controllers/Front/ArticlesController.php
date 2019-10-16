<?php

namespace App\Http\Controllers\Front;

use App\Models\Article;
use App\Models\Method;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(8);

        return \view('app.articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
        $methods = Method::inRandomOrder()->take(4)->get();
        return \view('app.articles.show', compact('article', 'methods'));
    }
}
