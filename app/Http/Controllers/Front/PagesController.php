<?php

namespace App\Http\Controllers\Front;

use App\Models\Category;
use App\Models\Command;
use App\Models\Method;
use App\Models\Page;
use App\Models\Question;
use App\Models\Review;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function contacts(Page $page): View
    {
        return view('app.pages.contacts', compact('page'));
    }

    public function about(Page $page): View
    {
        $team = Command::where('show_on_home', 1)->get();
        $reviews_video = Review::whereNotNull('video')->where('published', 1)->first();
        $reviews = Review::where('published', 1)->whereNull('video')->get();
        $departments = Category::take(6)->get();

        return view('app.pages.about', compact('page', 'reviews_video', 'reviews', 'team', 'departments'));
    }

    public function faq(Page $page)
    {
        $questions = Question::all();

        return view('app.questions.index', compact('questions', 'page'));
    }

    public function reviews(Page $page)
    {
        $reviews_video = Review::whereNotNull('video')->where('published', 1)->get();
        $reviews = Review::where('published', 1)->whereNull('video')->get();

        return view('app.reviews.index', compact('page', 'reviews', 'reviews_video'));
    }

    public function show(Page $page): View
    {
        if (method_exists($this, $page->slug)) {
            return $this->{$page->slug}($page);
        }

        return view('app.pages.default', compact('page'));
    }
}
