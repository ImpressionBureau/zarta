<?php

namespace App\Models;

use App\Traits\SluggableTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Category extends Model implements HasMedia, Sortable
{
    use SluggableTrait, HasMediaTrait, SortableTrait;

    protected $fillable = [
        'slug',
        'published',
        'order_no',
    ];

    protected $with = [
        'translates',
    ];

    public function directions(): BelongsToMany
    {
        return $this->belongsToMany(Direction::class);
    }

    public function commands(): BelongsToMany
    {
        return $this->belongsToMany(Command::class);
    }

    public function methods(): HasMany
    {
        return $this->hasMany(Method::class);
    }

    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }

    /* Scopes */

    public function scopePublished(Builder $builder): Builder
    {
        return $builder->where('published', 1);
    }

    public function getPreviewImageAttribute(): string
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
                    ->fit(Manipulations::FIT_CROP, 100, 100)
                    ->width(100)
                    ->height(100);

                $this
                    ->addMediaConversion('preview')
                    ->fit(Manipulations::FIT_CROP, 500, 350)
                    ->width(500)
                    ->height(350);
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
