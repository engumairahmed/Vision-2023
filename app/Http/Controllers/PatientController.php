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
        $result = User::select('*')
    ->join('prescriptions as p', 'users.id', '=', 'p.user_id')
    ->join('doctors as d', 'p.doctor_id', '=', 'd.doctor_id')
    ->join('prescription_medical_conditions as pc', 'p.presc_id', '=', 'pc.prescription_id')
    ->join('prescription_medications as pm', 'pm.prescription_id', '=', 'p.presc_id')
    ->where('users.id', $user_id)
    ->get();
    dd($result);
        return view('patient.home',compact('count','result'));
    }
    public function prescription(){
        $conditions=MedicalCondition::get();
        // $doctors=doctor::get();
        $doctors=User::with('doctor')->join('doctors','doctors.doc_user_id', '=', 'users.id')
    ->select('doctors.*', 'users.name', 'users.email')->get();
        $tests=LabTest::get();
        $medicine=Medication::get();
        return view('patient.prescription',compact('conditions','doctors','tests','medicine'));
    }
    public function newPlan(Request $r){
        // dd($r);
        $user = auth()->user();
        $presc=Prescription::create([
            'presc_user_id' => $user->id,
            'plan_name' => $r->plan_name,
            'start_date' => $r->start_date,
            'end_date' => $r->end_date,
            'presc_doctor_id' => $r->doctor_id,
            'doctor_name' => $r->doctor_name,
        ]);
        $medicalConditions=$r->input('medicalCondition',[]);
        foreach($medicalConditions as $item){
            // dd($item);
            $MedicalCondition=PrescriptionMedicalCondition::create([
            'pmc_prescription_id'=>$presc->id,
            'pmc_medical_condition_id'=>$item,   
            ]);
        }
        $tests=$r->input('test',[]);
        // dd($tests);
        foreach($tests as $item){
            // dd($item);
            PrescriptionLabTest::create([
            'pl_prescription_id'=>$presc->id,
            'pl_lab_test_id'=>$item,   
            ]);
        }

        $medicines=$r->input('medicine',[]);
        $frequency=$r->input('frequency',[]);
        $instruction=$r->input('instruction',[]);
        $meds=array_combine($medicines,$frequency);
        foreach($medicines as $key => $medicine){
            //   dd($item);
            PrescriptionMedication::create([
            'pm_prescription_id'=>$presc->id,
            'pm_medication_id'=>$medicine,
            'pm_frequency' => $frequency[$key],
            'pm_instructions' => $instruction[$key],   
            ]);
        }
        return redirect()->back();
    }
    public function profile(){
        return view('patient.profile');
    }
}
