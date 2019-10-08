<?php

namespace App\Http\Controllers\Admin;

use App\Models\Command;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $command = Command::create($request->only('slug'))->makeTranslation();

        if ($request->hasFile('command')) {
            $command->addMediaFromRequest('command')
                ->toMediaCollection('command');
        }
        return \redirect()->route('admin.commands.index')
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Command $command)
    {
        $command->slug = null;
        $command->update();
        $command->updateTranslation();
        if ($request->hasFile('command')) {
            $command->clearMediaCollection('command');
            $command->addMediaFromRequest('command')
                ->toMediaCollection('command');
        }
        return \redirect()->route('admin.commands.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    /**
     * @param Command $command
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Command $command)
    {
        $command->clearMediaCollection('command');
        $command->delete();
        return \redirect()->route('admin.commands.index')
            ->with('message', 'Запись успешно удалена.');
    }
}
