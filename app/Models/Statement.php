<?php

namespace App\Models;

use App\Enums\StatementStatus;
use Database\Factories\StatementFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Statement
 *
 * @property int $id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string $status
 * @property string $comment
 * @property int $is_active
 * @property string|null $registration_date
 * @property string|null $execution_date
 * @property string $pickup_time
 * @property int $client_id
 * @property int $vehicle_id
 * @property-read \App\Models\Client $client
 * @property-read Collection<int, \App\Models\UsedConsumable> $uconsumables
 * @property-read int|null $uconsumables_count
 * @property-read Collection<int, \App\Models\UsedService> $uservices
 * @property-read int|null $uservices_count
 * @property-read \App\Models\Vehicle $vehicle
 * @method static \Database\Factories\StatementFactory factory($count = null, $state = [])
 * @method static Builder|Statement newModelQuery()
 * @method static Builder|Statement newQuery()
 * @method static Builder|Statement query()
 * @method static Builder|Statement whereClientId($value)
 * @method static Builder|Statement whereComment($value)
 * @method static Builder|Statement whereCreatedAt($value)
 * @method static Builder|Statement whereExecutionDate($value)
 * @method static Builder|Statement whereId($value)
 * @method static Builder|Statement whereIsActive($value)
 * @method static Builder|Statement wherePickupTime($value)
 * @method static Builder|Statement whereRegistrationDate($value)
 * @method static Builder|Statement whereStatus($value)
 * @method static Builder|Statement whereUpdatedAt($value)
 * @method static Builder|Statement whereVehicleId($value)
 * @mixin Eloquent
 */
class Statement extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'comment',
        'pickup_time',
        'request_id',
        'client_id',
        'vehicle_id',
        'is_active',
        'registration_date',
        'execution_date'
    ];

    protected $attributes = ['status' => StatementStatus::NotComplete, 'is_active' => true];

    public function uconsumables(): HasMany
    {
        return $this->hasMany(UsedConsumable::class);
    }

    public function uservices(): HasMany
    {
        return $this->hasMany(UsedService::class);
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }
}
