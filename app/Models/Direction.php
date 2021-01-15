<?php

namespace App\Models;

use App\Traits\SluggableTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Direction extends Model implements HasMedia, Sortable
{
    use SluggableTrait, HasMediaTrait, SortableTrait;

    protected $fillable = [
        'slug',
        'category_id',
        'published',
        'order_no',
    ];

    protected $with = [
        'translates',
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    /* Scopes */

    public function scopePublished(Builder $builder): Builder
    {
        return $builder->where('published', 1);
    }

    public function getPreviewImageAttribute(): string
    {
        $media = 'images/no-image.png';

        if ($this->hasMedia('direction')) {
            $media = substr($this->getFirstMediaUrl('direction', 'preview'), 1);
        }

        return asset($media);
    }

    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('direction')
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

    /* Model boot */

    protected static function booted(): void
    {
        parent::booted();

        self::addGlobalScope('ordered', function (Builder $builder) {
            $builder->orderBy('order_no');
        });
    }
}
