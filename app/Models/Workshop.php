<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Workshop
 *
 * @property int $id
 * @property string $address
 * @property string $comment
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @method static Builder|Workshop newModelQuery()
 * @method static Builder|Workshop newQuery()
 * @method static Builder|Workshop query()
 * @method static Builder|Workshop whereAddress($value)
 * @method static Builder|Workshop whereComment($value)
 * @method static Builder|Workshop whereCreatedAt($value)
 * @method static Builder|Workshop whereId($value)
 * @method static Builder|Workshop whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Workshop extends Model
{
}
