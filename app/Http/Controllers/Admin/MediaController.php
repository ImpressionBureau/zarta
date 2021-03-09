<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\ImageResource;
use App\Models\MediaUpload;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\Image\Image;
use Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\DiskDoesNotExist;
use Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileDoesNotExist;
use Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileIsTooBig;
use Spatie\MediaLibrary\Models\Media;
use function response;

class MediaController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @throws DiskDoesNotExist
     * @throws FileDoesNotExist
     * @throws FileIsTooBig|InvalidManipulation
     */
    public function upload(Request $request)
    {
        $name = $request->input('name', 'image');

        $media = $this->handleMedia($request, $name);

        return response()->json(
            $media
                ? new ImageResource($media->getFirstMedia('uploads'))
                : null
        );
    }

    /**
     * @param Media $media
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Media $media)
    {
        $media->delete();
        return response()->json([]);
    }

    /**
     * @param Request $request
     * @param string $name
     * @return JsonResponse
     * @throws DiskDoesNotExist
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     * @throws InvalidManipulation
     */
    public function tiny(Request $request, $name = 'img')
    {
        $media = $this->handleMedia($request, $name);

        return response()->json([
            'image' => $media
                ? new ImageResource($media->getFirstMedia('uploads'))
                : null,
        ]);
    }

    /**
     * @param Request $request
     * @param $name
     * @return MediaUpload
     * @throws InvalidManipulation
     * @throws DiskDoesNotExist
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    private function handleMedia(Request $request, $name): MediaUpload
    {
        $media = null;

        if ($request->hasFile($name)) {
            $path = storage_path('tmp/uploads');
            $file = $request->file($name);
            $name = md5(uniqid());
            $file->move($path, $name);

            Image::load($path . '/' . $name)
                ->width(1140)
                ->height(1140)
                ->save();

            /** @var MediaUpload $media */
            $media = MediaUpload::create();
            $media->addMedia($path . '/' . $name)
                ->toMediaCollection('uploads');
        }

        return $media;
    }
}
