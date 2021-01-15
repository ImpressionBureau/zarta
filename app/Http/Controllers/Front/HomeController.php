<?php

namespace App\Http\Controllers\Front;

use App\Models\Article;
use App\Models\Category;
use App\Models\Command;
use App\Models\Direction;
use App\Models\Page;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $departments = Category::take(6)->get();
        $pages= Page::get();
        $team = Command::get();
        $reviews_video = Review::whereNotNull('video')->where('published', 1)->first();
        $reviews = Review::where('published', 1)->whereNull('video')->get();
        $about = Page::where('slug', 'about')->first();
        $articles = Article::latest()->published()->take(6)->get();

        return view('app.home.index', compact('departments', 'pages', 'team', 'reviews_video', 'reviews', 'about', 'articles'));
    }
}

