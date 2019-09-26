<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Method;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class MethodsController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return \view('admin.methods.index', [
            'methods' => Method::paginate(20),
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return \view('admin.methods.create', [
            'categories' => Category::where('thread', 'methods')->get(),
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $method = Method::create($request->only('slug', 'category_id'))->makeTranslation();

        if ($request->hasFile('method')) {
            $method->addMediaFromRequest('method')
                ->toMediaCollection('method');
        }
        return \redirect()->route('admin.methods.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    /**
     * @param Method $method
     * @return View
     */
    public function edit(Method $method): View
    {
        $categories = Category::where('thread', 'methods')->get();
        return \view('admin.methods.edit', compact('method', 'categories'));
    }

    /**
     * @param Request $request
     * @param Method $method
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Method $method)
    {

        $method->slug = null;
        $method->update();
        $method->updateTranslation();
        if ($request->hasFile('method')) {
            $method->clearMediaCollection('method');
            $method->addMediaFromRequest('method')
                ->toMediaCollection('method');
        }
        return \redirect()->route('admin.methods.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    /**
     * @param Method $method
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Method $method)
    {
        $method->clearMediaCollection('method');
        $method->delete();
        return \redirect()->route('admin.methods.index')
            ->with('message', 'Запись успешно удалена.');
    }
}
