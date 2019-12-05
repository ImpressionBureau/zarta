<?php

namespace App\Models;

use App\Traits\SluggableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Category extends Model implements HasMedia
{
    use SluggableTrait, HasMediaTrait;

    protected $fillable = [
        'slug',
        'thread',
        'published'
    ];

    protected $with = [
        'translates',
    ];

    /**
     * @return HasMany
     */
    public function directions(): HasMany
    {
        return $this->hasMany(Direction::class);
    }

    /**
     * @return HasMany
     */
    public function methods(): HasMany
    {
        return $this->hasMany(Method::class);
    }

    /**
     * @return HasMany
     */
    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }


    /**
     * @return string
     */
    public function getPreviewImageAttribute()
    {
        $media = 'images/no-image.png';

        if ($this->hasMedia('category')) {
            $media = substr($this->getFirstMediaUrl('category', 'preview'), 1);
        }

        return asset($media);
    }

    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('category')
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
}
