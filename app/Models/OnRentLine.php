<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $account
 * @property int $order_number
 * @property string $rental_start
 * @property string $dispatch_id
 * @property float $order_value
 */

class OnRentLine extends Model
{
    protected $fillable = [
        'account',
        'order_number',
        'rental_start',
        'dispatch_id',
        'order_value'
    ];

    public function OnRent(): BelongsTo
    {
        return $this->belongsTo(OnRent::class);
    }
}