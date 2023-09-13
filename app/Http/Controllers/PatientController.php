<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\LabTest;
use App\Models\Patient;
use App\Models\Medication;
use App\Models\Prescription;
use Illuminate\Http\Request;
use App\Models\MedicalReports;
use App\Models\MedicalCondition;
use Illuminate\Support\Facades\DB;
use App\Models\PrescriptionLabTest;
use Illuminate\Support\Facades\Auth;
use App\Models\PrescriptionMedication;
use App\Models\PrescriptionMedicalCondition;
use App\Models\Vitals;

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

    public function history()
    {
        $user_id = auth()->user()->id;

        $count = Prescription::where('presc_user_id', $user_id)->count();
        
        $result= Prescription::select(
            'u_patient.name as patient_name',
            'u_doctor.name as doc_name',
            'prescriptions.presc_id as presc_id',
            'prescriptions.plan_name',
            'prescriptions.start_date',
            'prescriptions.end_date',
            'prescriptions.doctor_name',
            'prescriptions.presc_doctor_id',
            'doctors.doc_user_id',
            'doctors.doc_contact',
            'doctors.specialization'
        )
        ->join('users as u_patient', 'prescriptions.presc_user_id', '=', 'u_patient.id')
        ->leftJoin('doctors', 'prescriptions.presc_doctor_id', '=', 'doctors.doctor_id')
        ->leftJoin('users as u_doctor', 'doctors.doc_user_id', '=', 'u_doctor.id')
        ->where(function($query) use ($user_id) {
            $query->where('prescriptions.presc_user_id', $user_id)
                  ->whereNull('prescriptions.presc_doctor_id');
        })->orWhere('prescriptions.presc_user_id', $user_id)
        ->get();
    
        return view('patient.history',compact('count','result'));
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
        $user = Auth::user();
        $plan=Prescription::find($id);        
            
        $prescription = Prescription::with(['medications', 'medicalConditions', 'labTests', 'doctor'])
        ->find($id);

        $medicalReports = MedicalReports::where('mr_prescription_id', $id)
        ->where('mr_created_by', $user->id)
        ->get();
        
        $medications = $prescription->medications;
        $medicalConditions = $prescription->medicalConditions;
        $labTests = $prescription->labTests;

        return view('patient.plan',compact('prescription','medications','medicalConditions','labTests','medicalReports'));
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
        // dd($meds);
        if(isset($medicines)){
            foreach($medicines as $key => $medicine){
                PrescriptionMedication::create([
                'pm_prescription_id'=>$prescId,
                'pm_medication_id'=>$medicine,
                'pm_frequency' => $frequency[$key],
                'pm_instructions' => $instruction[$key],   
                ]);
            }
        return redirect()->back()->with('msg','Prescription Plan Created without medication details');

        }
        return redirect()->back()->with('msg','Prescription Plan Created');
    }

    public function profile()
    {
        $user_id=auth()->user()->id;
        $userId=auth()->user();

        if ($userId->patient) {
            $user = $userId->patient;
        } else {
            $user = null;
        }
        // dd($user);
        return view('patient.profile',compact('user'));
    }
    public function medication(){
        $medicines = Medication::all();
        $medicineCount = Medication::count();
        return view('patient.medicine', compact('medicines','medicineCount'));
    }

    public function reports(){

        $userId = auth()->user()->id;

        $prescription=Prescription::where('presc_user_id', $userId)->get();

        return view('patient.add-report',compact('prescription'));
    }
    public function addReport(Request $r){
        $userId = auth()->user()->id;
        // dd($userId);
        $r->validate([
            'report'=>'image|mimes:jpeg,png,jpg,pdf,doc,docx|max:5120',
        ]);
        $originalFileName = $r->file('report')->getClientOriginalName();
        $file_name=time().$originalFileName.'.'.$r->report->extension();
        $path='files/'.$file_name;
        $r->report->move(public_path('files/'),$file_name);

        $report=MedicalReports::create([
            'mr_prescription_id' => $r->prescription,
            'mr_report' => $path,
            'mr_name'=>$originalFileName,
            'mr_created_by'=>$userId,
        ]);

        return redirect()->back()->with('msg','Report uploaded successfully');
    }

    public function vital(){
        return view('patient.vitals');
    }

    public function vitalCreate(Request $r){
        $userId=auth()->user()->id;
        $r->validate([
            'systolic'=>'numeric',
            'diastolic'=>'numeric',
            'body_temp'=>'numeric',
            'pulse_rate'=>'numeric',
            'respiratory_rate'=>'numeric',
            'spo2'=>'numeric',
            'blood_glucose'=>'numeric'
        ]);
        $bp=$r->systolic."/".$r->diastolic;
        Vitals::create([
        'vital_user_id'=>$userId,
        'blood_pressure'=>$bp,
        'body_temperature'=>$r->body_temp,
        'body_weight'=>$r->body_weight,
        'pulse_rate'=>$r->pulse_rate,
        'respiratory_rate'=>$r->respiratory_rate,
        'oxygen_saturation'=>$r->spo2,
        'blood_glucose_levels'=>$r->blood_glucose,
        'vital_created_by'=>$userId,
        ]);

        return redirect()->back()->with('msg','Vitals added successfully');
    }
}
