<?php

namespace App\Http\Controllers\Front;

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
        $directions = Direction::latest()->take(6)->get();
        $pages= Page::inRandomOrder()->take(3)->get();
        $team = Command::get();
        $reviews_video = Review::whereNotNull('video')->first();
        $reviews = Review::get();
        $about = Page::where('slug', 'about')->first();
        return view('app.home.index', compact('directions', 'pages', 'team', 'reviews_video', 'reviews', 'about'));
    }
}

