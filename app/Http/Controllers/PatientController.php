<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Vitals;
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
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Models\PrescriptionMedication;
use Illuminate\Validation\Rules\Password;
use App\Models\PrescriptionMedicalCondition;
use App\Models\SurgicalProcedure;

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
        ->where('p.presc_user_id', $user_id)
        ->get();       
        $vital = Vitals::where('vital_user_id', $user_id)->latest()->first();

        if ($vital) {
            return view('patient.home',compact('count','result','vital'));
        } else {
            $vital=Null;
            return view('patient.home',compact('count','result','vital'));
        }
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
            ->where('users.is_active',True)
            ->select('doctors.*', 'users.name', 'users.email')
            ->get();
            
        $tests=LabTest::get();

        $medicine=Medication::get();

        $sp=SurgicalProcedure::get();
        
        return view('patient.prescription',compact('conditions','doctors','tests','medicine','sp'));
    }

    public function planInfo($id)
    {
        $user = auth()->user();
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

    public function newPlan(Request $r){

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
            PrescriptionMedicalCondition::create([
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
        
        if(!empty($medicines)){
            foreach($medicines as $key => $medicine){
                if ($medicine !== null && $frequency[$key] !== null) {
                    PrescriptionMedication::create([
                        'pm_prescription_id'=>$prescId,
                        'pm_medication_id'=>$medicine,
                        'pm_frequency' => $frequency[$key],
                        'pm_instructions' => $instruction[$key],   
                    ]);
                }
            }
            return redirect()->back()->with('msg','Prescription Plan Created');
        }
        return redirect()->back()->with('msg','Prescription Plan Created without medication details');
    }

    public function profile(){
        
        $user = auth()->user();

        if ($user->patient) {
            $user = $user->patient;
        } else {
            $user = null;
        }
        
        return view('patient.profile',compact('user'));
    }

    public function updateInfo(Request $r){

        $id = auth()->user()->id;
    
        $r->validate([
            'name'=>'required|min:3',
            'email'=>'required|email|unique:users,email,'.$id,
            'image'=>'image|mimes:jpeg,png,jpg,gif|max:3072|dimensions:min_width=400,min_height=400,max_width=1000,max_height=1000',
        ]);
        
    
        DB::beginTransaction();
    
        try {
            if ($r->hasFile('image')) {
                $image = $r->file('image');                
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $path = public_path('files/images');
                $image->move($path, $imageName);
                
            
                    User::where('id', $id)->update([
                        'name' => $r->name,
                        'email' => $r->email,
                        'profile_pic'=>'files/images/'.$imageName,
                    ]);
                } else{
                    User::where('id', $id)->update([
                        'name' => $r->name,
                        'email' => $r->email,
                    ]);
                }
            
            Patient::where('pat_user_id', $id)->update([
                'father_name'=>$r->fatherName,
                'pat_gender'=>$r->gender,
                'pat_contact'=>$r->contact,
                'pat_address'=>$r->address,
                'pat_DOB'=>$r->dob,
                'blood_group'=>$r->bloodGroup
            ]);
    
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors(['error' => 'An error occurred while updating the information.']);
        }
    
        return redirect()->back()->with('msg', 'Information updated successfully.');
    }

    public function security(){
        return view('patient.security');
    }

    public function updatePass(Request $r){

        $user = auth()->user();        

        if (Hash::check($r->oldpass, $user->password)) {
            $r->validate([
                'pass' => [ 'required',
                            Password::min(8)
                                    ->letters()
                                    ->numbers()],
                'cpass' => 'same:pass',
            ]);

            $pass = Hash::make($r->pass);

            User::where('id', $user->id)->update([
                'password' => $pass
            ]);           
    
            return redirect()->back()->with('success', 'Password updated successfully.');

        } else {

            return redirect()->back()->with('error', 'Invalid old password.');
        }
    }

    public function medication(){
        $medicines = Medication::all();
        $medicineCount = Medication::count();
        return view('patient.medicine', compact('medicines','medicineCount'));
    }

    public function allReports(){

        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $reports = $user->medicalReports;
        
        $reportCount = $user->medicalReports->sum(function ($prescription) {
            return $prescription->medicalReports->count();
        });
        
        return view('patient.reports', compact('reports','reportCount'));
    }

    public function reports(){

        $user_id = auth()->user()->id;

        $prescription=Prescription::where('presc_user_id', $user_id)->get();

        return view('patient.add-report',compact('prescription'));
    }
    public function addReport(Request $r){

        $user_id = auth()->user()->id;
        
        $r->validate([
            'report'=>'file|mimes:jpeg,png,jpg,pdf,doc,docx|max:5120',
        ]);

        $originalFileName = $r->file('report')->getClientOriginalName();
        $file_name=time().$originalFileName.'.'.$r->report->extension();
        $path='files/'.$file_name;
        $r->report->move(public_path('files/'),$file_name);

        MedicalReports::create([
            'mr_prescription_id' => $r->prescription,
            'mr_report' => $path,
            'mr_name'=>$originalFileName,
            'mr_created_by'=>$user_id,
        ]);

        return redirect()->back()->with('msg','Report uploaded successfully');
    }

    public function deleteReport($id){

        $report = MedicalReports::findOrFail($id);
    
        $prescription = Prescription::findOrFail($report->mr_prescription_id);
    
        if (auth()->user()->id == $prescription->presc_user_id) {
            
            if (File::exists($report->mr_report)) {
                
                File::delete($report->mr_report);
            }

            $report->delete();
    
            return back()->with(['msg' => 'Report deleted successfully']);
        }
    
        return back()->withErrors(['You are not authorized to delete this report.']);
    }    

    public function vital(){
        return view('patient.vitals');
    }

    public function vitalCreate(Request $r){

        $user_id=auth()->user()->id;

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
            'vital_user_id'=>$user_id,
            'blood_pressure'=>$bp,
            'body_temperature'=>$r->body_temp."°F",
            'body_weight'=>$r->body_weight."KG",
            'pulse_rate'=>$r->pulse_rate."BPM",
            'respiratory_rate'=>$r->respiratory_rate,
            'oxygen_saturation'=>$r->spo2."%",
            'blood_glucose_levels'=>$r->blood_glucose."mg/dL",
            'vital_created_by'=>$user_id,
            ]);

        return redirect()->back()->with('msg','Vitals added successfully');
    }

    public function vitalHistory(){

        $user_id=auth()->user()->id;

        $vitals = Vitals::where('vital_user_id', $user_id)->with('createdByUser')->get();

        return view('patient.vital-history',compact('vitals'));
    }
}
