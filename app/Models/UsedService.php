<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\UsedService
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property int $quantity
 * @property int $statement_id
 * @property int $service_id
 * @property-read \App\Models\Service $service
 * @method static \Illuminate\Database\Eloquent\Builder|UsedService newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UsedService newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UsedService query()
 * @method static \Illuminate\Database\Eloquent\Builder|UsedService whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsedService whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsedService whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsedService whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsedService whereStatementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsedService whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UsedService extends Model
{
    protected $fillable = ['statement_id', 'service_id', 'quantity'];

    protected $attributes = ['quantity' => 1];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
