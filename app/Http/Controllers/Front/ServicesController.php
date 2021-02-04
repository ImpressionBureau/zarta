<?php

namespace App\Http\Controllers\Front;

use App\Models\Category;
use App\Models\Page;
use App\Models\Service;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function view;

class ServicesController extends Controller
{
    public function index(): View
    {
        $page = Page::where('slug', 'service')->first();
        $services = Service::where('published', 1)->get();

        return view('app.services.index', compact('services', 'page',));
    }

    public function show(Service $service): View
    {
        return view('app.services.show', compact('service'));
    }
}
