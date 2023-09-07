<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalCondition extends Model
{
    protected $table = 'medical_conditions'; 
    protected $primaryKey = 'condition_id';
    use HasFactory;

    protected $fillable = [
        'condition_name',
        'condition_description'  
    ];

    public function prescriptions()
    {
        return $this->belongsToMany(Prescription::class, 'prescription_medical_conditions', 'pmc_medical_condition_id', 'pmc_prescription_id');
    }
    
}

