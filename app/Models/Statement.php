<?php

namespace App\Models;

use App\Enums\StatementStatus;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Statement
 *
 * @property string $uuid
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property string $status
 * @property string $request_uuid
 * @property string $client_uuid
 * @property string $vehicle_uuid
 * @property int $is_active
 * @method static \Database\Factories\StatementFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Statement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Statement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Statement query()
 * @method static \Illuminate\Database\Eloquent\Builder|Statement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statement whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statement whereRequestUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statement whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statement whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statement whereUserUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statement whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statement whereVehicleUuid($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UsedConsumable> $uconsumables
 * @property-read int|null $uconsumables_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UsedService> $uservices
 * @property-read int|null $uservices_count
 * @method static \Illuminate\Database\Eloquent\Builder|Statement whereClientUuid($value)
 * @property-read \App\Models\Client $client
 * @property-read \App\Models\Request $request
 * @property-read \App\Models\Vehicle $vehicle
 * @property string|null $registration_date
 * @property string|null $execution_date
 * @method static \Illuminate\Database\Eloquent\Builder|Statement whereExecutionDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statement whereRegistrationDate($value)
 * @property string $comment
 * @property string $pickup_time
 * @method static \Illuminate\Database\Eloquent\Builder|Statement whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statement wherePickupTime($value)
 * @mixin \Eloquent
 */
class Statement extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'uuid';

    protected $fillable = ['status', 'comment', 'pickup_time', 'request_uuid', 'client_uuid', 'vehicle_uuid', 'is_active', 'registration_date', 'execution_date'];

    protected $attributes = ['status' => StatementStatus::NotComplete, 'is_active' => true];

    public function uconsumables(): HasMany
    {
        return $this->hasMany(UsedConsumable::class, 'statement_uuid', 'uuid');
    }

    public function uservices(): HasMany
    {
        return $this->hasMany(UsedService::class, 'statement_uuid', 'uuid');
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_uuid', 'uuid');
    }

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_uuid', 'uuid');
    }
}
