<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurgicalProcedure extends Model
{
    protected $table = 'surgical_procedures'; 
    protected $primaryKey = 'sp_id';
    use HasFactory;

    protected $fillable = [
        'sp_name',
        'sp_description'
    ];
}
