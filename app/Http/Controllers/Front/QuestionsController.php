<?php

namespace App\Http\Controllers\Front;

use App\Models\Page;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionsController extends Controller
{
    public function index()
    {
        $page = Page::where('slug', 'question')->first();
        $questions = Question::get();
        return \view('app.questions.index', compact('questions', 'page'));
    }
}
