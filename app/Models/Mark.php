<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Mark
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|Mark newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mark newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mark query()
 * @method static \Illuminate\Database\Eloquent\Builder|Mark whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mark whereName($value)
 * @mixin \Eloquent
 */
class Mark extends Model
{
    protected $fillable = ['name'];
}
