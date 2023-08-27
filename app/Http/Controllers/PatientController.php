<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\LabTest;
use App\Models\Medication;
use App\Models\Prescription;
use Illuminate\Http\Request;
use App\Models\MedicalCondition;

class PatientController extends Controller
{
    public function home(){
        $user_id = auth()->user()->id;

        $count = Prescription::where('user_id', $user_id)->count();
    
        return view('patient.home',compact('count'));
    }
    public function prescription(){
        $conditions=MedicalCondition::get();
        // $doctors=doctor::get();
        $doctors=User::with('doctor')->join('doctors','doctors.user_id', '=', 'users.id')
    ->select('doctors.*', 'users.name', 'users.email')->get();
        $tests=LabTest::get();
        $medicine=Medication::get();
        return view('patient.prescription',compact('conditions','doctors','tests','medicine'));
    }
    public function profile(){
        return view('patient.profile');
    }
}
