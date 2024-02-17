<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Consumable
 *
 * @property string $uuid
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Consumable newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Consumable newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Consumable query()
 * @method static \Illuminate\Database\Eloquent\Builder|Consumable whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Consumable whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Consumable whereUuid($value)
 * @mixin \Eloquent
 */
	class Consumable extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Mark
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|Mark newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mark newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mark query()
 * @method static \Illuminate\Database\Eloquent\Builder|Mark whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mark whereName($value)
 * @mixin \Eloquent
 */
	class Mark extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Model
 *
 * @property int $id
 * @property string $name
 * @property string|null $type
 * @property string|null $year
 * @property int $mark_id
 * @property-read \App\Models\Mark $mark
 * @method static \Illuminate\Database\Eloquent\Builder|Model newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Model newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Model query()
 * @method static \Illuminate\Database\Eloquent\Builder|Model whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Model whereMarkId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Model whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Model whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Model whereYear($value)
 * @mixin \Eloquent
 */
	class Model extends \Eloquent {}
}

namespace App\Models{
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
	class Request extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Service
 *
 * @property string $uuid
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service query()
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereUuid($value)
 * @mixin \Eloquent
 */
	class Service extends \Eloquent {}
}

namespace App\Models{
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
	class Statement extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Stuff
 *
 * @property string $user_uuid
 * @property string $workshop_uuid
 * @property string $role
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Stuff newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stuff newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stuff query()
 * @method static \Illuminate\Database\Eloquent\Builder|Stuff whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stuff whereUserUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stuff whereWorkshopUuid($value)
 * @mixin \Eloquent
 */
	class Stuff extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UsedConsumable
 *
 * @property string $uuid
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property string $statement_uuid
 * @property string $consumable_uuid
 * @method static \Illuminate\Database\Eloquent\Builder|UsedConsumable newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UsedConsumable newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UsedConsumable query()
 * @method static \Illuminate\Database\Eloquent\Builder|UsedConsumable whereClaimUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsedConsumable whereConsumableUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsedConsumable whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsedConsumable whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsedConsumable whereUuid($value)
 * @mixin \Eloquent
 */
	class UsedConsumable extends \Eloquent {}
}

namespace App\Models{
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
	class UsedService extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property string $uuid
 * @property string $first_name
 * @property string|null $second_name
 * @property string $last_name
 * @property int $is_active
 * @property string $email
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Stuff|null $stuff
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSecondName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUuid($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

namespace App\Models{
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
	class Vehicle extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Workshop
 *
 * @property string $uuid
 * @property string $address
 * @property string $comment
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Workshop newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Workshop newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Workshop query()
 * @method static \Illuminate\Database\Eloquent\Builder|Workshop whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workshop whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workshop whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workshop whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workshop whereUuid($value)
 * @mixin \Eloquent
 */
	class Workshop extends \Eloquent {}
}

