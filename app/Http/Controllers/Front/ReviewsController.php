<?php

namespace App\Http\Controllers\Front;

use App\Models\Page;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewsController extends Controller
{
    public function index()
    {
        $page = Page::where('slug', 'reviews')->first();
        $reviews_video = Review::whereNotNull('video')->where('published', 1)->get();
        $reviews = Review::where('published', 1)->whereNull('video')->get();
        return \view('app.reviews.index', compact('page', 'reviews', 'reviews_video'));
    }
}
