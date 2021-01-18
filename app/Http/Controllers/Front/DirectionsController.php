<?php

namespace App\Http\Controllers\Front;

use App\Models\Article;
use App\Models\Category;
use App\Models\Command;
use App\Models\Direction;
use App\Models\Method;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use function view;

class DirectionsController extends Controller
{
    public function index(): View
    {
        return view('app.directions.index', [
            'categories' => Category::all(),
            'team' => Command::all(),
        ]);
    }

    public function show(Category $category): View
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
