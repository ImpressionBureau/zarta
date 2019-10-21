<?php

namespace App\Http\Controllers\Front;

use App\Models\Command;
use App\Models\Method;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommandController extends Controller
{
    public function show(Command $command)
    {
        $methods = Method::inRandomOrder()->take(4)->get();
        return \view('app.command.show', compact('command', 'methods'));
    }
}
