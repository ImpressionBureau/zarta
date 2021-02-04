<?php

namespace App\Http\Controllers\Front;

use App\Models\Category;
use App\Models\Command;
use App\Models\Direction;
use App\Models\Method;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function view;

class MethodsController extends Controller
{
    public function index(): View
    {
        return view('app.methods.index', [
            'methods' => Direction::all(),
            'team' => Command::all(),
        ]);
    }

    public function show(Direction $direction): View
    {
        return view('app.methods.show', [
            'direction' => $direction,
            'model' => $direction->id,
            'type' => Direction::class,
        ]);
    }
}
