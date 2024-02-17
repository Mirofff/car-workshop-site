<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\UsedService
 *
 * @property string $uuid
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property string $statement_uuid
 * @property string $service_uuid
 * @method static \Illuminate\Database\Eloquent\Builder|UsedService newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UsedService newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UsedService query()
 * @method static \Illuminate\Database\Eloquent\Builder|UsedService whereClaimUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsedService whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsedService whereServiceUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsedService whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsedService whereUuid($value)
 * @mixin \Eloquent
 */
class UsedService extends Model
{
    use HasUuids;

    protected $primaryKey = 'uuid';

    protected $fillable = ['statement_uuid', 'service_uuid', 'quantity'];

    protected $attributes = ['quantity' => 1];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'service_uuid', 'uuid');
    }
}
