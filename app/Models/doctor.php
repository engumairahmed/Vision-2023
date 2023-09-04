<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctors'; 
    protected $primaryKey = 'doctor_id';
    use HasFactory;

    protected $fillable = [
        'doc_user_id',
        'specialization',
        'qualification',
        'housejob_start_date',
        'experience',
        'charges',
        'working_days',
        'timings',
        'doc_gender',
        'doc_address',
        'doc_DOB'
    ];
    public function user(){

        return $this->belongsTo(User::class, 'doc_user_id', 'id');

    }
    public function prescription(){

        return $this->belongsTo(Prescription::class, 'doc_user_id', 'id');

    }
}
