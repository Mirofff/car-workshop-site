<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Request
 *
 * @property string $uuid
 * @property string $datetime
 * @property string $comment
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property string $user_uuid
 * @property string $vehicle_uuid
 * @method static \Illuminate\Database\Eloquent\Builder|Request newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Request newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Request query()
 * @method static \Illuminate\Database\Eloquent\Builder|Request whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Request whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Request whereDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Request whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Request whereUserUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Request whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Request whereVehicleUuid($value)
 * @mixin \Eloquent
 */
class Request extends Model
{
    use HasUuids;

    protected $primaryKey = 'uuid';

    protected $fillable = ['datetime', 'user_uuid', 'vehicle_uuid'];

    public function statement(): HasOne
    {
        return $this->hasOne(Statement::class, 'request_uuid', 'uuid');
    }
}
