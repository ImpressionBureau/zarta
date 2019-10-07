<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subscribe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class SubscribesController extends Controller
{
    public function index():View
    {
        return \view('admin.subscribes.index', [
            'subscribes' => Subscribe::latest()->paginate(20),
        ]);
    }
}
