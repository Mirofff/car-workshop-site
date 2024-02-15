<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = ['datetime', 'user_uuid', 'vehicle_uuid'];
}
