<?php

namespace App\Http\Controllers\Front;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function contacts()
    {
        return \view('app.pages.contacts');
    }

}
