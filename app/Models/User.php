<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use App\Models\Doctor;
use App\Models\Patient;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_doctor',
        'is_active',
        'gauth_id',
        'gauth_type',
        'profile_pic'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $appends = [
        'profile_photo_url',
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function getCreatedAtAttribute($value)
    {
        $createdAt = Carbon::parse($value);

        return $createdAt->format('d F Y | h:i A');
    }

    public function patient(){

        return $this->hasOne(Patient::class, 'pat_user_id', 'id');

    }
    public function doctor(){

        return $this->hasOne(Doctor::class, 'doc_user_id', 'id');

    }
    public function prescriptions(){

        return $this->hasMany(Prescription::class, 'presc_user_id', 'id');

    }
    public function medicalReports()
    {
        return $this->prescriptions()->with('medicalReports');
    }
    
}
