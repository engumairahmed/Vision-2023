<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vitals extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'blood_pressure',
        'body_temperature',
        'body_weight',
        'pulse_rate',
        'respiratory_rate',
        'oxygen_saturation',
        'blood_glucose_levels'
    ];
}
