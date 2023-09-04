<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\LabTest;
use App\Models\Medication;
use App\Models\Prescription;
use Illuminate\Http\Request;
use App\Models\MedicalCondition;
use Illuminate\Support\Facades\DB;
use App\Models\PrescriptionLabTest;
use App\Models\PrescriptionMedication;
use App\Models\PrescriptionMedicalCondition;

class PatientController extends Controller
{
    public function home()
    {
        $user_id = auth()->user()->id;

        $count = Prescription::where('presc_user_id', $user_id)->count();

        $result = DB::table('prescriptions as p')
        ->join('users as u_patient', 'p.presc_user_id', '=', 'u_patient.id')
        ->join('doctors as d', 'p.presc_doctor_id', '=', 'd.doctor_id')
        ->join('users as u_doctor', 'd.doc_user_id', '=', 'u_doctor.id')
        ->select(
            'u_patient.name as patient_name',
            'u_doctor.name as doc_name',
            'p.presc_id',
            'p.plan_name',
            'p.start_date',
            'p.end_date',
            'p.doctor_name',
            'p.presc_doctor_id',
            'd.doc_user_id',
            'd.doc_contact',
            'd.specialization'
        )
        ->where('p.presc_user_id', 2)
        ->get();       

        return view('patient.home',compact('count','result'));
    }

    public function prescription()
    {
        $conditions=MedicalCondition::get();

        $doctors=User::with('doctor')
            ->join('doctors','doctors.doc_user_id', '=', 'users.id')
            ->select('doctors.*', 'users.name', 'users.email')
            ->get();
            
        $tests=LabTest::get();

        $medicine=Medication::get();
        
        return view('patient.prescription',compact('conditions','doctors','tests','medicine'));
    }

    public function planInfo($id)
    {
        $plan=Prescription::find($id);        
            
        $prescription = Prescription::with(['medications', 'medicalConditions', 'labTests', 'doctor'])
        ->find($id);
        
        $medications = $prescription->medications;
        $medicalConditions = $prescription->medicalConditions;
        $labTests = $prescription->labTests;

        return view('patient.plan',compact('prescription','medications','medicalConditions','labTests'));
    }

    public function newPlan(Request $r)
    {
        $user = auth()->user();
        $presc=Prescription::create([
            'presc_user_id' => $user->id,
            'plan_name' => $r->plan_name,
            'start_date' => $r->start_date,
            'end_date' => $r->end_date,
            'presc_doctor_id' => $r->doctor_id,
            'doctor_name' => $r->doctor_name,
            'presc_created_by' => $user->id,
        ]);
        $prescId=$presc->presc_id;
        $medicalConditions=$r->input('medicalCondition',[]);
        foreach($medicalConditions as $item){
            $MedicalCondition=PrescriptionMedicalCondition::create([
            'pmc_prescription_id'=>$prescId,
            'pmc_medical_condition_id'=>$item,   
            ]);
        }
        $tests=$r->input('test',[]);
        foreach($tests as $item){
            PrescriptionLabTest::create([
            'pl_prescription_id'=>$prescId,
            'pl_lab_test_id'=>$item,   
            ]);
        }

        $medicines=$r->input('medicine',[]);
        $frequency=$r->input('frequency',[]);
        $instruction=$r->input('instruction',[]);
        $meds=array_combine($medicines,$frequency);
        foreach($medicines as $key => $medicine){
            PrescriptionMedication::create([
            'pm_prescription_id'=>$prescId,
            'pm_medication_id'=>$medicine,
            'pm_frequency' => $frequency[$key],
            'pm_instructions' => $instruction[$key],   
            ]);
        }
        return redirect()->back()->with('msg','Prescription Plan Created');
    }

    public function profile()
    {
        return view('patient.profile');
    }
}
