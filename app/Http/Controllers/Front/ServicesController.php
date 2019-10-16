<?php

namespace App\Http\Controllers\Front;

use App\Models\Category;
use App\Models\Page;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServicesController extends Controller
{
    public function index()
    {
        $cat= null;
        $page = Page::where('slug', 'service')->first();
        $services = Service::query();
        $categories = Category::get();
        if (request()->filled('category')) {
            $cat = Category::where('slug', request('category'))->first();
            $services = $services->where('category_id', $cat->id)->get();
        } else {
            $services = $services->get();
        }

        return \view('app.services.index', compact('services', 'page', 'cat', 'categories'));
    }
}
