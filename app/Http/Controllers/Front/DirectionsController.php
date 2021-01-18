<?php

namespace App\Http\Controllers\Front;

use App\Models\Article;
use App\Models\Category;
use App\Models\Direction;
use App\Models\Method;
use App\Http\Controllers\Controller;
use function view;

class DirectionsController extends Controller
{
    public function show(Category $category)
    {
        $methods = $category->methods;
        $team = $category->commands;

        dd($category, $methods, $team);

        return view('app.directions.show', compact('category', 'methods', 'team'));
    }
}
