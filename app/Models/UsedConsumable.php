<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\UsedConsumable
 *
 * @property string $uuid
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property string $statement_uuid
 * @property string $consumable_uuid
 * @method static \Illuminate\Database\Eloquent\Builder|UsedConsumable newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UsedConsumable newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UsedConsumable query()
 * @method static \Illuminate\Database\Eloquent\Builder|UsedConsumable whereClaimUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsedConsumable whereConsumableUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsedConsumable whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsedConsumable whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsedConsumable whereUuid($value)
 * @property int $quantity
 * @property-read \App\Models\Consumable $consumable
 * @method static \Illuminate\Database\Eloquent\Builder|UsedConsumable whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsedConsumable whereStatementUuid($value)
 * @mixin \Eloquent
 */
class UsedConsumable extends Model
{
    use HasUuids;

    protected $primaryKey = 'uuid';

    protected $fillable = ['statement_uuid', 'consumable_uuid', 'quantity'];

    protected $attributes = ['quantity' => 1];

    public function consumable(): BelongsTo
    {
        return $this->belongsTo(Consumable::class, 'consumable_uuid', 'uuid');
    }
}
