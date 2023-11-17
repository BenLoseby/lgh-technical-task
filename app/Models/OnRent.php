<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string $gen_date
 * @property int $contracts
 * @property int $quotes
 * @property float $weekly_value
 */

class OnRent extends Model
{
    protected $table = 'on_rent';

    protected $fillable = [
        'gen_date',
        'contracts',
        'quotes',
        'weekly_value',
    ];

    public function onRentLines(): HasMany
    {
        return $this->hasMany(onRentLines::class);
    }
}