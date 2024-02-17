<?php

namespace App\Models;

use App\Enums\StatementStatus;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Statement
 *
 * @property string $uuid
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property string $status
 * @property string $request_uuid
 * @property string $user_uuid
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
 * @mixin \Eloquent
 */
class Statement extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'uuid';

    protected $fillable = ['status', 'request_uuid', 'user_uuid', 'vehicle_uuid', 'is_active'];

    protected $attributes = ['status' => StatementStatus::NotComplete, 'is_active' => true];

    public function uconsumables(): HasMany {
        return $this->hasMany(UsedConsumable::class, 'statement_uuid', 'uuid');
    }

    public function uservices(): HasMany {
        return $this->hasMany(UsedService::class, 'statement_uuid', 'uuid');
    }
}
