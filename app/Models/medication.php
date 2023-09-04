<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    protected $table = 'medications'; 
    protected $primaryKey = 'medic_id';
    use HasFactory;

    protected $fillable = [
        'medicine',
        'dosage',
        'medic_descripition',        
    ];
}
