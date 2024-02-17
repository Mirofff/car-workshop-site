<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Workshop
 *
 * @property string $uuid
 * @property string $address
 * @property string $comment
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Workshop newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Workshop newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Workshop query()
 * @method static \Illuminate\Database\Eloquent\Builder|Workshop whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workshop whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workshop whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workshop whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workshop whereUuid($value)
 * @mixin \Eloquent
 */
class Workshop extends Model
{
}
