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
        'service_type',
        'service_id',
        'message',
        'status'
    ];

    /**
     * Scope orders by non-finished status
     * @param Builder $q
     * @return Builder
     */
    public function scopeProcessing(Builder $q)
    {
        return $q->where('status', 'processing')->orWhere('status', 'no_dial');
    }

    public function getServiceAttribute()
    {
        return $this->service_type::find($this->service_id);
    }
}
