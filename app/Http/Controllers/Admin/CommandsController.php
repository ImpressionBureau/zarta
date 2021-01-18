<?php

namespace App\Http\Controllers\Admin;

use App\Models\Command;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\DiskDoesNotExist;
use Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileDoesNotExist;
use Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileIsTooBig;
use function redirect;

class CommandsController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return \view('admin.commands.index', [
            'commands' => Command::paginate(20),
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return \view('admin.commands.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $command = Command::create($request->only('slug'))->makeTranslation();
        $command->categories()->attach($request->input('categories'));

        if ($request->hasFile('command')) {
            $command->addMediaFromRequest('command')
                ->toMediaCollection('command');
        }

        return redirect()->route('admin.commands.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    /**
     * @param Command $command
     * @return View
     */
    public function edit(Command $command): View
    {
        return \view('admin.commands.edit', compact('command'));
    }

    /**
     * @param Request $request
     * @param Command $command
     * @return RedirectResponse
     * @throws DiskDoesNotExist
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function update(Request $request, Command $command)
    {
        $command->slug = null;
        $command->update();
        $command->updateTranslation();
        $command->categories()->sync($request->input('categories'));

        if ($request->hasFile('command')) {
            $command->clearMediaCollection('command');
            $command->addMediaFromRequest('command')
                ->toMediaCollection('command');
        }

        return redirect()->route('admin.commands.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    /**
     * @param Request $request
     * @param Command $command
     * @return RedirectResponse
     */
    public function order(Request $request, Command $command): RedirectResponse
    {
        $command->{$request->input('order')}();

        return back();
    }

    /**
     * @param Command $command
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Command $command)
    {
        $command->clearMediaCollection('command');
        $command->delete();
        return redirect()->route('admin.commands.index')
            ->with('message', 'Запись успешно удалена.');
    }
}
