<?php

namespace App\Models;

use App\Enums\UserRole;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * App\Models\Stuff
 *
 * @property string $client_uuid
 * @property string $workshop_uuid
 * @property string $role
 * @property-read \App\Models\Client $user
 * @method static \Illuminate\Database\Eloquent\Builder|Stuff newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stuff newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stuff query()
 * @method static \Illuminate\Database\Eloquent\Builder|Stuff whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stuff whereUserUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stuff whereWorkshopUuid($value)
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
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|Stuff whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stuff whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stuff whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stuff whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stuff whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stuff wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stuff whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stuff whereSecondName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stuff whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stuff whereUuid($value)
 * @mixin \Eloquent
 */
class Stuff extends Authenticatable
{

    use HasUuids, HasApiTokens, Notifiable;

    protected $table = 'stuff';

    protected $primaryKey = "uuid";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'second_name',
        'email',
        'password',
        'role',
        'workshop_uuid',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];

    public function getRole(): UserRole
    {
        return UserRole::from($this->role);
    }

}
