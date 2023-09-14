<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MedicalReports extends Model
{
    use HasFactory;

    protected $fillable = [
        'mr_prescription_id',
        'mr_report',
        'mr_name',
        'mr_created_by'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function getCreatedAtAttribute($value)
    {
        $createdAt = Carbon::parse($value);

        return $createdAt->format('d F Y | h:i A');
    }

    public function prescription()
    {
        return $this->belongsTo(Prescription::class, 'mr_prescription_id', 'presc_id');
    }
}
