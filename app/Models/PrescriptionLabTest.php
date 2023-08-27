<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrescriptionLabTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'prescription_id',
        'lab_test_id',
        'instructions'
    ];
}

