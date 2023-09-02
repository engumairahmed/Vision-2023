<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vitals extends Model
{
    use HasFactory;

    protected $fillable = [
        'vital_user_id',
        'blood_pressure',
        'body_temperature',
        'body_weight',
        'pulse_rate',
        'respiratory_rate',
        'oxygen_saturation',
        'blood_glucose_levels'
    ];
}
