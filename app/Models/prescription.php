<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'presc_user_id',
        'plan_name',
        'start_date',
        'end_date',        
        'doctor_name',
        'presc_doctor_id'
    ];
}
