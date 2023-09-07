<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabTest extends Model
{
    protected $table = 'lab_tests'; 
    protected $primaryKey = 'test_id';
    use HasFactory;

    protected $fillable = [
        'test_name',
        'test_description'  
    ];

    public function prescriptions(){
        
        return $this->belongsToMany(Prescription::class, 'prescription_lab_tests', 'pl_lab_test_id', 'pl_prescription_id');
    }

}
