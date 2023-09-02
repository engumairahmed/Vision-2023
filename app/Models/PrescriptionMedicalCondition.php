<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrescriptionMedicalCondition extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'pmc_prescription_id',
        'pmc_medical_condition_id',
    ];
}
