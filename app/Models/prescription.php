<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'medical_condition',
        'start_date',
        'end_date',
        'doctor_id',
        'doctor_name'
    ];
}
