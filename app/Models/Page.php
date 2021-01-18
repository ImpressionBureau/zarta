<?php

namespace App\Models;

use App\Http\Resources\ImageResource;
use App\Traits\SluggableTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Page extends Model implements HasMedia, Sortable
{
    use SluggableTrait, HasMediaTrait, SortableTrait, SoftDeletes;

    protected $fillable = [
        'slug', 'order_no', 'show_in_slider',
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

        if ($this->hasMedia('page')) {
            $media = substr($this->getFirstMediaUrl('page', 'preview'), 1);
        }

        return asset($media);
    }

    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('page')
            ->registerMediaConversions(function (Media $media = null) {
                $this
                    ->addMediaConversion('thumb')
                    ->crop(Manipulations::CROP_CENTER, 100, 100)
                    ->width(100)
                    ->height(100);

                $this
                    ->addMediaConversion('preview')
                    ->crop(Manipulations::CROP_CENTER, 385, 193)
                    ->width(385)
                    ->height(193);
            });
    }

    public function getImagesListAttribute()
    {
        return ImageResource::collection($this->getMedia('uploads'));
    }

    /* Model boot */

    protected static function booted(): void
    {
        parent::booted();

        self::addGlobalScope('ordered', function (Builder $builder) {
            $builder->orderBy('order_no');
        });
    }
}
