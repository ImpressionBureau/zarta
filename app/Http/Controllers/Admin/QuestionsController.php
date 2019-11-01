<?php

namespace App\Http\Controllers\Admin;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class QuestionsController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return \view('admin.questions.index', [
            'questions' => Question::paginate(20),
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return \view('admin.questions.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        Question::create()->makeTranslation();

        return \redirect()->route('admin.questions.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    /**
     * @param Question $question
     * @return View
     */
    public function edit(Question $question): View
    {
        return \view('admin.questions.edit', compact('question'));
    }

    /**
     * @param Request $request
     * @param Question $question
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Question $question)
    {
        $question->slug = null;
        $question->update();
        $question->updateTranslation();
        return \redirect()->route('admin.questions.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    /**
     * @param Question $question
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Question $question)
    {
        $question->delete();
        return \redirect()->route('admin.questions.index')
            ->with('message', 'Запись успешно удалена.');
    }
}
