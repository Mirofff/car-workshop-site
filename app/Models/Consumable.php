<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Consumable
 *
 * @property string $uuid
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Consumable newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Consumable newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Consumable query()
 * @method static \Illuminate\Database\Eloquent\Builder|Consumable whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Consumable whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Consumable whereUuid($value)
 * @mixin \Eloquent
 */
class Consumable extends Model
{
    use HasUuids;
    protected $primaryKey = 'uuid';

    protected $fillable = ['name', 'price'];
}
