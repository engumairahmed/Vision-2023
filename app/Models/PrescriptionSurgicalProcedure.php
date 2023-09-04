<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrescriptionSurgicalProcedure extends Model
{
    protected $table = 'prescription_surgical_procedures'; 
    protected $primaryKey = 'psp_id';
    use HasFactory;

    protected $fillable = [
        'psp_prescription_id',
        'psp_procedure_id',
        'psp_instructions'
    ];
}
