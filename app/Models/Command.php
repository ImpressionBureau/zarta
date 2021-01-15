<?php

namespace App\Models;

use App\Traits\SluggableTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Command extends Model implements HasMedia, Sortable
{
    use SluggableTrait, HasMediaTrait, SortableTrait;

    protected $fillable = [
        'slug', 'order_no',
    ];

    protected $with = [
        'translates',
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * @return string
     */
    public function getPreviewImageAttribute()
    {
        $media = 'images/no-image.png';

        if ($this->hasMedia('command')) {
            $media = substr($this->getFirstMediaUrl('command', 'preview'), 1);
        }

        return asset($media);
    }

    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('command')
            ->registerMediaConversions(function (Media $media = null) {
                $this
                    ->addMediaConversion('thumb')
                    ->fit(Manipulations::FIT_CROP, 100, 100)
                    ->width(100)
                    ->height(100);

                $this
                    ->addMediaConversion('preview')
                    ->fit(Manipulations::FIT_CROP, 480, 480)
                    ->width(480)
                    ->height(480);
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
