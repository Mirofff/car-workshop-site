<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Model
 *
 * @property int $id
 * @property string $name
 * @property string|null $type
 * @property string|null $year
 * @property int $mark_id
 * @property-read \App\Models\Mark $mark
 * @method static \Illuminate\Database\Eloquent\Builder|Model newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Model newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Model query()
 * @method static \Illuminate\Database\Eloquent\Builder|Model whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Model whereMarkId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Model whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Model whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Model whereYear($value)
 * @mixin \Eloquent
 */
class Model extends EloquentModel
{
    protected $fillable = ['name', 'type', 'year', 'mark_id'];

    public function mark(): BelongsTo
    {
        return $this->belongsTo(Mark::class);
    }
}
