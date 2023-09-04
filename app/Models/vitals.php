<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vitals extends Model
{
    protected $table = 'vitals'; 
    protected $primaryKey = 'vital_id';
    use HasFactory;

    protected $fillable = [
        'vital_user_id',
        'blood_pressure',
        'body_temperature',
        'body_weight',
        'pulse_rate',
        'respiratory_rate',
        'oxygen_saturation',
        'blood_glucose_levels',
        'vital_created_by'
    ];
    
}
