<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $table = 'prescriptions'; 
    protected $primaryKey = 'presc_id';

    use HasFactory;

    protected $fillable = [
        'presc_user_id',
        'plan_name',
        'start_date',
        'end_date',        
        'doctor_name',
        'presc_doctor_id',
        'presc_created_by'
    ];

    public function medications(){

        return $this->belongsToMany(Medication::class, 'prescription_medications', 'pm_prescription_id', 'pm_medication_id')
        ->withPivot('pm_frequency','pm_instructions');
    }

    public function medicalConditions(){

        return $this->belongsToMany(MedicalCondition::class, 'prescription_medical_conditions', 'pmc_prescription_id', 'pmc_medical_condition_id');
    }

    public function labTests(){

        return $this->belongsToMany(LabTest::class, 'prescription_lab_tests', 'pl_prescription_id', 'pl_lab_test_id');
    }
    
    public function doctor(){

        return $this->belongsTo(Doctor::class, 'presc_doctor_id', 'doctor_id');
    }
    public function medicalReports()
    {
        return $this->hasMany(MedicalReports::class, 'mr_prescription_id', 'presc_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'presc_user_id');
    }

}
