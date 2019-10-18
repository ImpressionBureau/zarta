<?php

namespace App\Http\Controllers\Front;

use App\Models\Command;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommandController extends Controller
{
    public function show(Command $command)
    {
        return \view('app.command.show', compact('command'));
    }
}
