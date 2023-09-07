<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalReports extends Model
{
    use HasFactory;

    protected $fillable = [
        'mr_prescription_id',
        'mr_report',
        'mr_name',
        'mr_created_by'
    ];
}
