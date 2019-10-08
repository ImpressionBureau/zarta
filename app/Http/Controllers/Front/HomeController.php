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
        $ids = [1,2,3];
        $pages= Page::where(function ($builder) use ($ids){
            $builder->whereIn('id', $ids);
        })->get();
        $team = Command::get();
        $reviews_video = Review::has('video')->first();
        $reviews = Review::get();
        return view('app.home.index', compact('directions', 'pages', 'team', 'reviews_video', 'reviews'));
    }
}

