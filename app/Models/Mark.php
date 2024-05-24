<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Mark
 *
 * @property int $id
 * @property string $name
 * @method static Builder|Mark newModelQuery()
 * @method static Builder|Mark newQuery()
 * @method static Builder|Mark query()
 * @method static Builder|Mark whereId($value)
 * @method static Builder|Mark whereName($value)
 * @mixin Eloquent
 */
class Mark extends Model
{
    protected $fillable = ['name'];
}
