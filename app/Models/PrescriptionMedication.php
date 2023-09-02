<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrescriptionMedication extends Model
{
    use HasFactory;

    protected $fillable = [
        'pm_prescription_id',
        'pm_medication_id',
        'pm_frequency',
        'pm_instructions'
    ];
}
