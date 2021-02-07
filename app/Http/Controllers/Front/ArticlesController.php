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
        $articles = Article::latest()->published()->paginate(12);

        return view('app.articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('app.articles.show', compact('article'));
    }
}
