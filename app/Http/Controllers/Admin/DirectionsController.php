<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Direction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class DirectionsController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return \view('admin.directions.index', [
            'directions' => Direction::paginate(20),
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return \view('admin.directions.create', [
            'categories'=> Category::where('thread', 'directions')->get(),
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $direction = Direction::create($request->only('slug', 'category_id'))->makeTranslation();

        if ($request->hasFile('direction')) {
            $direction->addMediaFromRequest('direction')
                ->toMediaCollection('direction');
        }
        return \redirect()->route('admin.directions.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    /**
     * @param Direction $direction
     * @return View
     */
    public function edit(Direction $direction): View
    {
        $categories = Category::where('thread', 'directions')->get();
        return \view('admin.directions.edit', compact('direction', 'categories'));
    }

    /**
     * @param Request $request
     * @param Direction $direction
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Direction $direction)
    {

        $direction->slug = null;
        $direction->update();
        $direction->updateTranslation();
        if ($request->hasFile('direction')) {
            $direction->clearMediaCollection('direction');
            $direction->addMediaFromRequest('direction')
                ->toMediaCollection('direction');
        }
        return \redirect()->route('admin.directions.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    /**
     * @param Direction $direction
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Direction $direction)
    {
        $direction->clearMediaCollection('direction');
        $direction->delete();
        return \redirect()->route('admin.directions.index')
            ->with('message', 'Запись успешно удалена.');
    }
}
