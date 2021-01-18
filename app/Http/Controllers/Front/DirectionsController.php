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
        return view('app.directions.show', [
            'category' => $category,
            'methods' => $category->directions,
            'team' => $category->commands,
            'type' => Category::class,
            'model' => $category->id,
        ]);
    }
}
