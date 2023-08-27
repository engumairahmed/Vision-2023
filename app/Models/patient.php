<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'father_name',
        'husband_name',
        'gender',
        'address',
        'contact',
        'DOB',
        'blood_group'
    ];
    public function user(){

        return $this->belongsTo(User::class);

    }
}
