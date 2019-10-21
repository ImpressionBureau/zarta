<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ServicesController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return \view('admin.services.index', [
            'services' => Service::paginate(20),
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return \view('admin.services.create', [
            'categories' => Category::get(),
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $service = Service::create($request->only('slug', 'category_id', 'price'))->makeTranslation();

        return \redirect()->route('admin.services.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    /**
     * @param Service $service
     * @return View
     */
    public function edit(Service $service): View
    {
        $categories = Category::get();
        return \view('admin.services.edit', compact('service', 'categories'));
    }

    /**
     * @param Request $request
     * @param Service $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Service $service)
    {

        $service->slug = null;
        $service->update($request->only('slug', 'category_id', 'price'));
        $service->updateTranslation();
        return \redirect()->route('admin.services.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    /**
     * @param Service $sevice
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Service $sevice)
    {
        $sevice->delete();
        return \redirect()->route('admin.services.index')
            ->with('message', 'Запись успешно удалена.');
    }
}
