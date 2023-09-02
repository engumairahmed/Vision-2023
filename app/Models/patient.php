<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'pat_user_id',
        'father_name',
        'husband_name',
        'pat_gender',
        'pat_address',
        'pat_contact',
        'pat_DOB',
        'blood_group'
    ];
    public function user(){

        return $this->belongsTo(User::class, 'pat_user_id', 'id');

    }
}
