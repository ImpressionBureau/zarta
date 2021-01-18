<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\ImageResource;
use App\Models\MediaUpload;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;

class MediaController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\DiskDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileIsTooBig
     */
    public function upload(Request $request)
    {
        $media = null;

        if ($request->hasFile($request->input('name', 'image'))) {
            /** @var MediaUpload $media */
            $media = MediaUpload::create();
            $media->addMediaFromRequest($request->input('name', 'image'))
                ->toMediaCollection('uploads');
        }

        return response()->json($media ? new ImageResource($media->getFirstMedia('uploads')) : null);
    }

    /**
     * @param Media $media
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Media $media)
    {
        $media->delete();
        return \response()->json([]);
    }
    public function tiny(Request $request, $name = 'img')
    {
        $media = null;

        if ($request->hasFile($name)) {
            /** @var MediaUpload $media */
            $media = MediaUpload::create();
            $media->addMediaFromRequest($name)->toMediaCollection('uploads');
        }

        return response()->json([
            'image' => $media ? new ImageResource($media->getFirstMedia('uploads')) : null,
        ]);
    }
}
