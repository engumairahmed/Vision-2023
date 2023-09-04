<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrescriptionLabTest extends Model
{
    protected $table = 'prescription_lab_tests'; 
    protected $primaryKey = 'pl_id';
    use HasFactory;

    protected $fillable = [
        'pl_prescription_id',
        'pl_lab_test_id',
        'pl_instructions'
    ];
}

