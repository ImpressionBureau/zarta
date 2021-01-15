<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Direction;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\DiskDoesNotExist;
use Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileDoesNotExist;
use Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileIsTooBig;
use function redirect;

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
        return \view('admin.directions.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws DiskDoesNotExist
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function store(Request $request): RedirectResponse
    {
        /** @var Direction $direction */
        $direction = Direction::create($request->only('slug', 'published'))->makeTranslation();

        $direction->categories()->attach($request->input('categories'));

        if ($request->hasFile('direction')) {
            $direction->addMediaFromRequest('direction')
                ->toMediaCollection('direction');
        }
        return redirect()->route('admin.directions.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    /**
     * @param Direction $direction
     * @return View
     */
    public function edit(Direction $direction): View
    {
        return \view('admin.directions.edit', compact('direction'));
    }

    /**
     * @param Request $request
     * @param Direction $direction
     * @return RedirectResponse
     * @throws DiskDoesNotExist
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function update(Request $request, Direction $direction): RedirectResponse
    {
        $direction->slug = null;
        $direction->update($request->only('slug', 'published'));
        $direction->categories()->sync($request->input('categories'));
        $direction->updateTranslation();

        if ($request->hasFile('direction')) {
            $direction->clearMediaCollection('direction');
            $direction->addMediaFromRequest('direction')
                ->toMediaCollection('direction');
        }
        return redirect()->route('admin.directions.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    /**
     * @param Direction $direction
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Direction $direction): RedirectResponse
    {
        $direction->clearMediaCollection('direction');
        $direction->delete();
        return redirect()->route('admin.directions.index')
            ->with('message', 'Запись успешно удалена.');
    }
}
