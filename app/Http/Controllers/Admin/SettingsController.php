<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\ImageResource;
use App\Models\MediaUpload;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
    public function update(Request $request)
    {
        $setting = Setting::first();
        $setting->update($request->only('phone', 'phone_additional', 'email', 'facebook', 'instagram', 'youtube'));
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
        /* if ($request->hasFile('banner')) {
             $setting->clearMediaCollection('banner');
             $setting->addMediaFromRequest('banner')
                 ->toMediaCollection('banner');
         }*/
        return redirect()->route('admin.settings.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    public function images(Request $request)
    {
        $model = Setting::find(1);

        if ($request->hasFile($request->input('name', 'image'))) {
            $model
                ->addMediaFromRequest($request->input('name', 'image'))
                ->toMediaCollection($request->input('collection', 'uploads'));
        }

        return response()->json(new ImageResource($model->getFirstMedia(
            $request->input('collection', 'uploads'), 'thumb',
        )));
    }
}
