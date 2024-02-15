<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
