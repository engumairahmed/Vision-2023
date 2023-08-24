<?php

namespace App\Http\Controllers;

use App\Models\medical_condition;
use App\Models\prescription;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function home(){
        $user_id = auth()->user()->id;

        $count = prescription::where('user_id', $user_id)->count();
    
        return view('patient.home',compact('count'));
    }
    public function prescription(){
        $conditions=medical_condition::get();
        return view('patient.prescription',compact('conditions'));
    }
    public function profile(){
        return view('patient.profile');
    }
}
