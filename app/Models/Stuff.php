<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
class Stuff extends Model
{
    use HasUuids;

    protected $table = 'stuff';
    protected $primaryKey = 'user_uuid';
    protected $fillable = ['user_uuid', 'workshop_uuid'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_uuid', 'uuid');
    }
}
