<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;


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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $setting = Setting::first();
        $setting->update($request->only('phone', 'phone_additional', 'email', 'facebook', 'instagram', 'youtube'));
        $setting->updateTranslation();
        if ($request->hasFile('banner')) {
            $setting->clearMediaCollection('banner');
            $setting->addMediaFromRequest('banner')
                ->toMediaCollection('banner');
        }
        return \redirect()->route('admin.settings.index')
            ->with('message', 'Запись успешно сохранена.');
    }
}
