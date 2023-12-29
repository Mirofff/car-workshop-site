<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'license_plate',
        'vin',
        'year',
        'mileage',
        'register_sign',
        'model_id',
        'user_id',
        'engine_id',
    ];
}
