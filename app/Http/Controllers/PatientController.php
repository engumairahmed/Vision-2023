<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\LabTest;
use App\Models\Medication;
use App\Models\Prescription;
use Illuminate\Http\Request;
use App\Models\MedicalCondition;
use App\Models\PrescriptionLabTest;
use App\Models\PrescriptionMedication;

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
    public function newPlan(Request $r){
        $user = auth()->user();
        $presc=Prescription::create([
            'user_id' => $user,
            'plan_name' => $r->plan_name,
            'start_date' => $r->start_date,
            'end_date' => $r->end_date,
            'doctor_id' => $r->doctor_id,
            'doctor_name' => $r->doctor_name,
        ]);
        $medicalConditions=$r->input('medicalConditions',[]);
        $MedicalCondition='';
        foreach($medicalConditions as $item){
            $MedicalCondition=MedicalCondition::create([
            'prescription_id'=>$presc->id,
            'medical_condition_id'=>$item->condition_id,   
            ]);
        }
        $tests=$r->input('tests',[]);
        foreach($tests as $item){
            $test=PrescriptionLabTest::create([
            'prescription_id'=>$presc->id,
            'lab_test_id'=>$item->lab_id,   
            ]);
        }
        $medicines=$r->input('medicines',[]);

        foreach($medicines as $item){
            $test=PrescriptionMedication::create([
            'prescription_id'=>$presc->id,
            'lab_test_id'=>$item->lab_id,   
            ]);
        }
    }
    public function profile(){
        return view('patient.profile');
    }
}
