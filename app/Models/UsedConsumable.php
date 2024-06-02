<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\UsedConsumable
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property int $quantity
 * @property int $statement_id
 * @property int $consumable_id
 * @property-read \App\Models\Consumable $consumable
 * @method static \Illuminate\Database\Eloquent\Builder|UsedConsumable newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UsedConsumable newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UsedConsumable query()
 * @method static \Illuminate\Database\Eloquent\Builder|UsedConsumable whereConsumableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsedConsumable whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsedConsumable whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsedConsumable whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsedConsumable whereStatementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsedConsumable whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UsedConsumable extends Model
{
    protected $fillable = ['statement_id', 'consumable_id', 'quantity'];

    protected $attributes = ['quantity' => 1];

    public function consumable(): BelongsTo
    {
        return $this->belongsTo(Consumable::class);
    }
}
