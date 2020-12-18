<?php

namespace App\Models;

use App\Http\Resources\ImageResource;
use App\Traits\SluggableTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Article extends Model implements HasMedia
{
    use SluggableTrait, HasMediaTrait;

    protected $fillable = [
        'slug',
        'published'
    ];

    protected $with = [
        'translates',
    ];

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('published', 1);
    }

    /**
     * @return string
     */
    public function getPreviewImageAttribute()
    {
        $media = 'images/no-image.png';

        if ($this->hasMedia('article')) {
            $media = substr($this->getFirstMediaUrl('article', 'preview'), 1);
        }

        return asset($media);
    }

    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('article')
            ->registerMediaConversions(function (Media $media = null) {
                $this
                    ->addMediaConversion('thumb')
                    ->fit(Manipulations::FIT_CROP, 100, 100)
                    ->width(100)
                    ->height(100);

                $this
                    ->addMediaConversion('preview')
                    ->fit(Manipulations::FIT_CROP, 362, 232)
                    ->width(362)
                    ->height(232);
            });
    }


    public function getImagesListAttribute()
    {
        return ImageResource::collection($this->getMedia('uploads'));
    }
}
