<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\ImageResource;
use App\Models\Setting;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\MediaLibrary\Models\Media;
use function redirect;


class SettingsController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return \view('admin.settings.index', [
            'setting' => Setting::first(),
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        $setting = Setting::first();

        $setting->update($request->all());
        $setting->updateTranslation();

        if ($request->filled('media')) {
            foreach ($request->input('media') as $media) {
                Media::find($media)->update([
                    'model_type' => Setting::class,
                    'model_id' => $setting->id,
                    'collection_name' => 'banner'
                ]);
            }
        }

        if ($request->hasFile('feedback')) {
            $setting->addMediaFromRequest('feedback')->toMediaCollection('feedback');
        }

        return redirect()->route('admin.settings.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    public function images(Request $request): JsonResponse
    {
        $model = Setting::find(1);

        if ($request->hasFile($request->input('name', 'image'))) {
            $model
                ->addMediaFromRequest($request->input('name', 'image'))
                ->toMediaCollection($request->input('collection', 'uploads'));
        }

        return response()->json(
            new ImageResource(
                $model->getFirstMedia(
                    $request->input('collection', 'uploads')
                )
            )
        );
    }
}
