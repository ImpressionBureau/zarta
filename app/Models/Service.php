<?php

namespace App\Models;

use App\Traits\SluggableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    use SluggableTrait;

    protected $fillable = [
        'slug',
        'category_id',
        'price',
    ];
    protected $with = [
        'translates',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
