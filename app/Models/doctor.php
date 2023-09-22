<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    protected $table = 'doctors'; 
    protected $primaryKey = 'doctor_id';
    use HasFactory;

    protected $fillable = [
        'doc_user_id',
        'doc_contact',
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

    public function getCarbonExperienceAttribute()
    {
        if ($this->housejob_start_date) {
            return Carbon::parse($this->housejob_start_date)->diffInYears(Carbon::now());
        }
        
        return null; // Handle the case where housejob_start_date is not set
    }

    public function user(){

        return $this->belongsTo(User::class, 'doc_user_id', 'id');

    }
    
    public function prescription(){

        return $this->belongsTo(Prescription::class, 'doc_user_id', 'id');

    }

    public function prescriptions(){

        return $this->hasMany(Prescription::class, 'presc_doctor_id', 'doctor_id');

    }
}
