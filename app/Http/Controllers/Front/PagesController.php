<?php

namespace App\Http\Controllers\Front;

use App\Models\Command;
use App\Models\Method;
use App\Models\Page;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function contacts()
    {
        $page = Page::where('slug', 'contacts')->first();
        return \view('app.pages.contacts', compact('page'));
    }

    public function about()
    {
        $page = Page::where('slug', 'about')->first();
        $team = Command::get();
        $methods = Method::inRandomOrder()->take(4)->get();
        $reviews_video = Review::whereNotNull('video')->where('published', 1)->first();
        $reviews = Review::where('published', 1)->get();
        return \view('app.pages.about', compact('page', 'reviews_video', 'reviews', 'team', 'methods'));
    }

}
