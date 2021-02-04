<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use function redirect;

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
        return \view('admin.services.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        Service::create($request->only('slug', 'category_id', 'price', 'published'))->makeTranslation();

        return redirect()->route('admin.services.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    /**
     * @param Service $service
     * @return View
     */
    public function edit(Service $service): View
    {
        return \view('admin.services.edit', compact('service'));
    }

    /**
     * @param Request $request
     * @param Service $service
     * @return RedirectResponse
     */
    public function update(Request $request, Service $service): RedirectResponse
    {
        $service->slug = null;
        $service->update($request->only('slug', 'category_id', 'price', 'published'));
        $service->updateTranslation();

        return redirect()->route('admin.services.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    /**
     * @param Request $request
     * @param Service $service
     * @return RedirectResponse
     */
    public function order(Request $request, Service $service): RedirectResponse
    {
        $service->{$request->input('order')}();

        return back();
    }

    /**
     * @param Service $service
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Service $service): RedirectResponse
    {
        $service->delete();

        return redirect()->route('admin.services.index')
            ->with('message', 'Запись успешно удалена.');
    }
}
