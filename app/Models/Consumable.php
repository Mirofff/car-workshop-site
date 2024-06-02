<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Consumable
 *
 * @property int $id
 * @property string $name
 * @property float $price
 * @method static \Illuminate\Database\Eloquent\Builder|Consumable newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Consumable newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Consumable query()
 * @method static \Illuminate\Database\Eloquent\Builder|Consumable whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Consumable whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Consumable wherePrice($value)
 * @mixin \Eloquent
 */
class Consumable extends Model
{
    public $timestamps = false;

    protected $fillable = ['name', 'price'];
}
