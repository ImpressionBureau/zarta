<?php

namespace App\Http\Controllers\Admin;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ReviewsController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return \view('admin.reviews.index', [
            'reviews' => Review::paginate(20),
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return \view('admin.reviews.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $review = Review::create($request->only('slug', 'video', 'facebook', 'published'))->makeTranslation();

        if ($request->hasFile('review')) {
            $review->addMediaFromRequest('review')
                ->toMediaCollection('review');
        }
        return \redirect()->route('admin.reviews.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    /**
     * @param Review $review
     * @return View
     */
    public function edit(Review $review): View
    {
        return \view('admin.reviews.edit', compact('review'));
    }

    /**
     * @param Request $request
     * @param Review $review
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Review $review)
    {

        $review->slug = null;
        $review->update($request->only( 'slug','video', 'facebook', 'published'));
        $review->updateTranslation();
        if ($request->hasFile('review')) {
            $review->clearMediaCollection('review');
            $review->addMediaFromRequest('review')
                ->toMediaCollection('review');
        }
        return \redirect()->route('admin.reviews.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    /**
     * @param Review $review
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Review $review)
    {
        $review->clearMediaCollection('review');
        $review->delete();
        return \redirect()->route('admin.articles.index')
            ->with('message', 'Запись успешно удалена.');
    }
}
