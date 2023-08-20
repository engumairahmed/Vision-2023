<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lab_test extends Model
{
    use HasFactory;

    protected $fillable = [
        'test_name',
        'test_description'  
    ];
}
