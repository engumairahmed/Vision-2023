<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class surgical_procedure extends Model
{
    use HasFactory;

    protected $fillable = [
        'procedure_name',
        'description'
    ];
}
