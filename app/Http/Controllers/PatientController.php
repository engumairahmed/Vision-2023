<?php

namespace App\Http\Controllers;

use App\Models\doctor;
use App\Models\LabTest;
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
        $doctors=doctor::get();
        $tests=LabTest::get();
        return view('patient.prescription',compact('conditions','doctors','tests'));
    }
    public function profile(){
        return view('patient.profile');
    }
}
