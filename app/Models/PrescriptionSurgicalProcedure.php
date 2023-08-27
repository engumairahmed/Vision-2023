<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrescriptionSurgicalProcedure extends Model
{
    use HasFactory;

    protected $fillable = [
        'prescription_id',
        'surgical_procedure_id',
        'instructions'
    ];
}
