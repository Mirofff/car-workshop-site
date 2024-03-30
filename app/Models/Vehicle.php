<?php

namespace App\Models;

use App\Models\Model as VehicleModel;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Vehicle
 *
 * @property string $uuid
 * @property string $registration_plate
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property int $model_id
 * @property string $workshop_uuid
 * @property string $client_uuid
 * @property int $is_active
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle query()
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereRegistrationPlate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereUserUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereWorkshopUuid($value)
 * @property-read \App\Models\Mark|null $mark
 * @property-read VehicleModel $model
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereClientUuid($value)
 * @property string $vin
 * @property string $engine
 * @property string|null $tech_passport
 * @property string $year_of_manufacture
 * @property int $mileage
 * @property string $color
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereEngine($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereMileage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereTechPassport($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereVehicleClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereVin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereYearOfManufacture($value)
 * @mixin \Eloquent
 */
class Vehicle extends Model
{
    use HasUuids;

    protected $primaryKey = 'uuid';

    protected $fillable = ['uuid',
                           'registration_plate',
                           'model_id',
                           'workshop_uuid',
                           'client_uuid',
                           'is_active',
                           'vin',
                           'engine',
                           'tech_passport',
                           'mileage',
                           'color',
                           'mark_id',];

    protected $attributes = ['is_active' => true];

    public function model(): BelongsTo
    {
        return $this->belongsTo(VehicleModel::class);
    }
}
