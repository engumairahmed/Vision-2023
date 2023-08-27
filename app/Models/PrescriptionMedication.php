<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrescriptionMedication extends Model
{
    use HasFactory;

    protected $fillable = [
        'prescription_id',
        'medication_id',
        'dosage',
        'frequency',
        'instructions'
    ];
}
