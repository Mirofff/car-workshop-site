<?php

namespace App\Models;

use App\Enums\StatementStatus;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statement extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'uuid';

    protected $fillable = ['status', 'request_uuid', 'user_uuid', 'vehicle_uuid', 'is_active'];

    protected $attributes = ['status' => StatementStatus::NotComplete, 'is_active' => true];
}
