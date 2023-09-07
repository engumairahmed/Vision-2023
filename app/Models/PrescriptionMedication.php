<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrescriptionMedication extends Model
{
    protected $table = 'prescription_medications'; 
    protected $primaryKey = 'pm_id';
    use HasFactory;

    protected $fillable = [
        'pm_prescription_id',
        'pm_medication_id',
        'pm_frequency',
        'pm_instructions'
    ];

    public function medication(){
        return $this->belongsTo(Medication::class, 'pm_medication_id', 'medic_id');
    }
}
