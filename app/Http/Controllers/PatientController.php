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
use App\Models\PrescriptionMedicalCondition;
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
        // dd($r);
        $user = auth()->user();
        $presc=Prescription::create([
            'user_id' => $user->id,
            'plan_name' => $r->plan_name,
            'start_date' => $r->start_date,
            'end_date' => $r->end_date,
            'doctor_id' => $r->doctor_id,
            'doctor_name' => $r->doctor_name,
        ]);
        $medicalConditions=$r->input('medicalCondition',[]);
        foreach($medicalConditions as $item){
            // dd($item);
            $MedicalCondition=PrescriptionMedicalCondition::create([
            'prescription_id'=>$presc->id,
            'medical_condition_id'=>$item,   
            ]);
        }
        $tests=$r->input('test',[]);
        // dd($tests);
        foreach($tests as $item){
            // dd($item);
            PrescriptionLabTest::create([
            'prescription_id'=>$presc->id,
            'lab_test_id'=>$item,   
            ]);
        }

        $medicines=$r->input('medicine',[]);
        $frequency=$r->input('frequency',[]);
        $instruction=$r->input('instruction',[]);
        $meds=array_combine($medicines,$frequency);
        foreach($medicines as $key => $medicine){
            //   dd($item);
            PrescriptionMedication::create([
            'prescription_id'=>$presc->id,
            'medication_id'=>$medicine,
            'frequency' => $frequency[$key],
            'instructions' => $instruction[$key],   
            ]);
        }
        return redirect()->back();
    }
    public function profile(){
        return view('patient.profile');
    }
}
