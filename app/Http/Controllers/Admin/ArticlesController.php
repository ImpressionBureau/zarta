<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\MediaLibrary\Models\Media;
use function redirect;

class ArticlesController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return \view('admin.articles.index', [
            'articles' => Article::paginate(20),
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return \view('admin.articles.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $article = Article::create($request->only('slug', 'published'))->makeTranslation();
        $this->handleMedia($request, $article);

        return redirect()->route('admin.articles.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    /**
     * @param Article $article
     * @return View
     */
    public function edit(Article $article): View
    {
        return \view('admin.articles.edit', compact('article'));
    }

    /**
     * @param Request $request
     * @param Article $article
     * @return RedirectResponse
     */
    public function update(Request $request, Article $article): RedirectResponse
    {
        $article->slug = null;
        $article->update($request->only('published'));
        $article->updateTranslation();
        $this->handleMedia($request, $article);

        return redirect()->route('admin.articles.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    /**
     * @param Article $article
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Article $article): RedirectResponse
    {
        $article->clearMediaCollection('article');
        $article->delete();

        return redirect()->route('admin.articles.index')
            ->with('message', 'Запись успешно удалена.');
    }

    /**
     * @param Request $request
     * @param Article $article
     */
    private function handleMedia(Request $request, Article $article): void
    {
        if ($request->filled('media')) {
            foreach ($request->input('media') as $media) {
                Media::find($media)->update([
                    'model_type' => Article::class,
                    'model_id' => $article->id,
                ]);
            }
        }
    }
}
