<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\DiskDoesNotExist;
use Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileDoesNotExist;
use Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileIsTooBig;

class CategoriesController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return \view('admin.categories.index', [
            'categories' => Category::paginate(20),
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return \view('admin.categories.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $category = Category::create($request->only('slug', 'published'))->makeTranslation();

        if ($request->hasFile('category')) {
            $category->addMediaFromRequest('category')
                ->toMediaCollection('category');
        }

        return redirect()->route('admin.categories.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    /**
     * @param Category $category
     * @return View
     */
    public function edit(Category $category): View
    {
        return \view('admin.categories.edit', compact('category'));
    }

    /**
     * @param Request $request
     * @param Category $category
     * @return RedirectResponse
     * @throws DiskDoesNotExist
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function update(Request $request, Category $category): RedirectResponse
    {
        $category->slug = null;
        $category->update($request->only('slug', 'published'));
        $category->updateTranslation();

        if ($request->hasFile('category')) {
            $category->clearMediaCollection('category');
            $category->addMediaFromRequest('category')
                ->toMediaCollection('category');
        }
        return redirect()->route('admin.categories.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    /**
     * @param Request $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function order(Request $request, Category $category): RedirectResponse
    {
        $category->{$request->input('order')}();

        return back();
    }

    /**
     * @param Category $category
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('message', 'Запись успешно удалена.');
    }
}
