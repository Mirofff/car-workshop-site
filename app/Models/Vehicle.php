<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Vehicle
 *
 * @property string $uuid
 * @property string $registration_plate
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property int $model_id
 * @property string $workshop_uuid
 * @property string $user_uuid
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
 * @mixin \Eloquent
 */
class Vehicle extends Model
{
}
