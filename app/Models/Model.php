<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Model extends EloquentModel
{
    protected $fillable = ['name', 'type', 'year', 'mark_id'];

    public function mark(): BelongsTo
    {
        return $this->belongsTo(Mark::class);
    }
}
