<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Spatie\MediaLibrary\Models\Media;
use Str;

class PagesController extends Controller
{
    public function index(): View
    {
        return view('admin.pages.index', [
            'pages' => Page::all(),
        ]);
    }

    public function edit(Page $page): View
    {
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $page->update([
            'slug' => Str::slug($request->input('slug')),
            'show_in_slider' => $request->has('show_in_slider'),
        ]);

        $page->updateTranslation();

        if ($request->hasFile('page')) {
            $page->clearMediaCollection('page');
            $page->addMediaFromRequest('page')
                ->toMediaCollection('page');
        }

        $this->handleMedia($request, $page);

        return redirect()->route('admin.pages.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    /**
     * @param Request $request
     * @param Page $page
     */
    private function handleMedia(Request $request, Page $page): void
    {
        if ($request->filled('media')) {
            foreach ($request->input('media') as $media) {
                Media::find($media)->update([
                    'model_type' => Page::class,
                    'model_id' => $page->id,
                ]);
            }
        }
    }
}
