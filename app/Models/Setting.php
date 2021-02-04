<?php

namespace App\Models;

use App\Http\Resources\ImageResource;
use App\Traits\TranslatableTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Setting extends Model implements HasMedia
{
    use TranslatableTrait, HasMediaTrait;

    protected $fillable = [
        'phone',
        'phone_additional',
        'phone_additional_2',
        'email',
        'facebook',
        'instagram',
        'youtube',
        'telegram',
        'latitude',
        'longitude',
    ];

    protected $with = [
        'translates',
    ];

    /**
     * @return string
     */
    public function getPreviewImageAttribute()
    {
        $media = 'images/no-image.png';

        if ($this->hasMedia('banner')) {
            $media = substr($this->getFirstMediaUrl('banner', 'preview'), 1);
        }

        return asset($media);
    }

    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('banner')
            ->registerMediaConversions(function (Media $media = null) {
                $this
                    ->addMediaConversion('thumb')
                    ->fit(Manipulations::FIT_CROP, 200, 200)
                    ->width(200)
                    ->height(200);

                $this
                    ->addMediaConversion('preview')
                    ->fit(Manipulations::FIT_CROP, 1920, 1080)
                    ->width(1920)
                    ->height(1080);
            });

        $this
            ->addMediaCollection('awards')
            ->registerMediaConversions(function (Media $media = null) {
                $this
                    ->addMediaConversion('thumb')
                    ->fit(Manipulations::FIT_CROP, 200, 200)
                    ->width(200)
                    ->height(200);
            });

        $this
            ->addMediaCollection('feedback')
            ->singleFile()
            ->registerMediaConversions(function (Media $media = null) {
                $this
                    ->addMediaConversion('thumb')
                    ->fit(Manipulations::FIT_CROP, 600, 600)
                    ->width(600)
                    ->height(600);
            });
    }

    public function getImagesList($collection)
    {
        return ImageResource::collection($this->getMedia($collection));
    }
}
