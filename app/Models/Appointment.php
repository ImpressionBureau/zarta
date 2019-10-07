<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{
    public static $STATUSES = [
        'processing',
        'no_dial',
        'finished',
        'rejected',
    ];

    protected  $fillable = [
        'name',
        'phone',
        'email',
        'service_id',
        'message',
        'status'
    ];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Scope orders by non-finished status
     * @param Builder $q
     * @return Builder
     */
    public function scopeProcessing(Builder $q)
    {
        return $q->where('status', 'processing')->orWhere('status', 'no_dial');
    }
}
