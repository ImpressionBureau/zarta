<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Command;
use App\Models\Page;
use App\Models\Review;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        return view('app.home.index', [
            'departments' => Category::take(6)->get(),
            'pages' => Page::where('show_in_slider', 1)->get(),
            'team' => Command::where('show_on_home', 1)->get(),
            'reviews' => Review::where('published', 1)->whereNull('video')->get(),
            'reviews_video' => Review::whereNotNull('video')->where('published', 1)->first(),
            'about' => Page::where('slug', 'about')->first(),
            'articles' => Article::latest()->published()->take(6)->get(),
            'awards' => Setting::first()->getMedia('awards'),
        ]);
    }
}

