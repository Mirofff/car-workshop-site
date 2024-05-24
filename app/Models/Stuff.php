<?php

namespace App\Models;

use App\Enums\UserRole;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\PersonalAccessToken;

/**
 * App\Models\Stuff
 *
 * @property int $id
 * @property string $role
 * @property string $first_name
 * @property string|null $second_name
 * @property string $last_name
 * @property int $is_active
 * @property string $email
 * @property mixed $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read DatabaseNotificationCollection<int, DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection<int, PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static Builder|Stuff newModelQuery()
 * @method static Builder|Stuff newQuery()
 * @method static Builder|Stuff query()
 * @method static Builder|Stuff whereCreatedAt($value)
 * @method static Builder|Stuff whereEmail($value)
 * @method static Builder|Stuff whereFirstName($value)
 * @method static Builder|Stuff whereId($value)
 * @method static Builder|Stuff whereIsActive($value)
 * @method static Builder|Stuff whereLastName($value)
 * @method static Builder|Stuff wherePassword($value)
 * @method static Builder|Stuff whereRememberToken($value)
 * @method static Builder|Stuff whereRole($value)
 * @method static Builder|Stuff whereSecondName($value)
 * @method static Builder|Stuff whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Stuff extends Authenticatable
{

    use HasApiTokens, Notifiable;

    protected $table = 'stuff';

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
