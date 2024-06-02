<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Model
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $cylinders
 * @property float|null $engine_displacement
 * @property string|null $drive
 * @property int|null $epa_index
 * @property string|null $engine_descriptor
 * @property int|null $epa_fuel_economy
 * @property string|null $fuel_type
 * @property string|null $transmission
 * @property string|null $city_mpg
 * @property string|null $highway_mpg
 * @property string|null $class
 * @property string|null $year
 * @property string|null $mfr_code
 * @property string|null $base_model
 * @property int $mark_id
 * @property-read \App\Models\Mark $mark
 * @method static Builder|Model newModelQuery()
 * @method static Builder|Model newQuery()
 * @method static Builder|Model query()
 * @method static Builder|Model whereBaseModel($value)
 * @method static Builder|Model whereCityMpg($value)
 * @method static Builder|Model whereClass($value)
 * @method static Builder|Model whereCylinders($value)
 * @method static Builder|Model whereDrive($value)
 * @method static Builder|Model whereEngineDescriptor($value)
 * @method static Builder|Model whereEngineDisplacement($value)
 * @method static Builder|Model whereEpaFuelEconomy($value)
 * @method static Builder|Model whereEpaIndex($value)
 * @method static Builder|Model whereFuelType($value)
 * @method static Builder|Model whereHighwayMpg($value)
 * @method static Builder|Model whereId($value)
 * @method static Builder|Model whereMarkId($value)
 * @method static Builder|Model whereMfrCode($value)
 * @method static Builder|Model whereName($value)
 * @method static Builder|Model whereTransmission($value)
 * @method static Builder|Model whereYear($value)
 * @mixin Eloquent
 */
class Model extends EloquentModel
{
    protected $fillable = ['name', 'type', 'year', 'mark_id'];

    public function mark(): BelongsTo
    {
        return $this->belongsTo(Mark::class);
    }
}
