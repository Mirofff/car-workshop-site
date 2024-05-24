<?php

namespace App\Models;

use App\Models\Model as VehicleModel;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Vehicle
 *
 * @property int $id
 * @property string $registration_plate
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $is_active
 * @property string $vin
 * @property string|null $tech_passport
 * @property int $mileage
 * @property string $color
 * @property int $model_id
 * @property int $client_id
 * @property-read \App\Models\Mark|null $mark
 * @property-read VehicleModel $model
 * @method static Builder|Vehicle newModelQuery()
 * @method static Builder|Vehicle newQuery()
 * @method static Builder|Vehicle query()
 * @method static Builder|Vehicle whereClientId($value)
 * @method static Builder|Vehicle whereColor($value)
 * @method static Builder|Vehicle whereCreatedAt($value)
 * @method static Builder|Vehicle whereId($value)
 * @method static Builder|Vehicle whereIsActive($value)
 * @method static Builder|Vehicle whereMileage($value)
 * @method static Builder|Vehicle whereModelId($value)
 * @method static Builder|Vehicle whereRegistrationPlate($value)
 * @method static Builder|Vehicle whereTechPassport($value)
 * @method static Builder|Vehicle whereUpdatedAt($value)
 * @method static Builder|Vehicle whereVin($value)
 * @mixin Eloquent
 */
class Vehicle extends Model
{
    protected $fillable = [
        'id',
        'registration_plate',
        'model_id',
        'workshop_id',
        'client_id',
        'is_active',
        'vin',
        'engine',
        'tech_passport',
        'mileage',
        'color',
        'mark_id',
    ];

    protected $attributes = ['is_active' => true];

    public function model(): BelongsTo
    {
        return $this->belongsTo(VehicleModel::class);
    }
}
