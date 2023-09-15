<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vitals extends Model
{
    protected $table = 'vitals'; 
    protected $primaryKey = 'vital_id';
    use HasFactory;

    protected $fillable = [
        'vital_user_id',
        'blood_pressure',
        'body_temperature',
        'body_weight',
        'pulse_rate',
        'respiratory_rate',
        'oxygen_saturation',
        'blood_glucose_levels',
        'vital_created_by'
    ];
    
    protected $dates = ['created_at', 'updated_at'];

    public function getCreatedAtAttribute($value)
    {
        $createdAt = Carbon::parse($value);

        return $createdAt->format('d F Y | h:i A');
    }

    public function createdByUser() {
        return $this->belongsTo(User::class, 'vital_created_by', 'id');
    }
}
