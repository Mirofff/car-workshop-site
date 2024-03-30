<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Request
 *
 * @property string $uuid
 * @property string $datetime
 * @property string $comment
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property string $client_uuid
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
 * @property-read \App\Models\Client $client
 * @property-read \App\Models\Statement|null $statement
 * @property-read \App\Models\Vehicle $vehicle
 * @method static \Illuminate\Database\Eloquent\Builder|Request whereClientUuid($value)
 * @mixin \Eloquent
 */
class Request extends Model
{
    use HasUuids;

    protected $primaryKey = 'uuid';

    protected $fillable = ['datetime', 'comment', 'client_uuid', 'vehicle_uuid'];

    public function statement(): HasOne
    {
        return $this->hasOne(Statement::class, 'request_uuid', 'uuid');
    }

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_uuid', 'uuid');
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_uuid', 'uuid');
    }
}
