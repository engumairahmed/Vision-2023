<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Doctor;
use App\Models\LabTest;
use App\Models\Messages;
use App\Models\Medication;
use App\Models\Prescription;
use Illuminate\Http\Request;
use App\Models\MedicalReports;
use App\Models\MedicalCondition;
use App\Models\SurgicalProcedure;
use Illuminate\Support\Facades\DB;
use App\Models\PrescriptionLabTest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Models\PrescriptionMedication;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use App\Models\PrescriptionMedicalCondition;

class DoctorController extends Controller
{
    public function home(){
        $user_id = auth()->user()->id;
        $doctorId = Doctor::where('doc_user_id', $user_id)->value('doctor_id');
        $patients = User::join('prescriptions', 'users.id', '=', 'prescriptions.presc_user_id')
            ->where('prescriptions.presc_doctor_id', $doctorId)
            ->select('users.name','prescriptions.*')
            ->distinct()
            ->get();
        $count = Prescription::where('presc_doctor_id', $doctorId)->count();
        return view('doctor.home',compact('count','patients'));
    }

    public function planInfo($id)
    {
        $user = auth()->user();
        $plan=Prescription::find($id);        
            
        $prescription = Prescription::with(['medications', 'medicalConditions', 'labTests', 'doctor'])
        ->find($id);

        $medicalReports = MedicalReports::where('mr_prescription_id', $id)
        ->get();
        
        $medications = $prescription->medications;
        $medicalConditions = $prescription->medicalConditions;
        $labTests = $prescription->labTests;
        $user = $prescription->user;
        return view('doctor.plan',compact('prescription','medications','medicalConditions','labTests','medicalReports','user'));
    }

    public function profile(){

        $userId=auth()->user();

        if ($userId->doctor) {
            $user = $userId->doctor;
        } else {
            $user = null;
        }
        return view('doctor.profile',compact('user'));
    }

    public function updateInfo(Request $r){
        $id = auth()->user()->id;
    
        $r->validate([
            'name'=>'required|min:3',
            'email'=>'required|email|unique:users,email,'.$id,
            'image'=>'image|mimes:jpeg,png,jpg,gif|max:3072|dimensions:min_width=400,min_height=400,max_width=1000,max_height=1000,ratio=1/1',
            'contact'=>'numeric:min(11):max(11)',
            'charges'=>'numeric',

        ]);
    
        DB::beginTransaction();
    
        try {
            if ($r->hasFile('image')) {
                $oldImage = User::where('id', $id)->value('profile_pic');
                if (Storage::exists($oldImage)) {                
                    Storage::delete($oldImage);
                }
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
            
            Doctor::where('doc_user_id', $id)->update([
                'doc_contact'=>$r->contact,
                'specialization'=>$r->specialization,
                'qualification'=>$r->qualification,
                'housejob_start_date'=>$r->housejob,
                'experience'=>$r->experience,
                'charges'=>$r->charges,
                'working_days'=>$r->workingDays,
                'timings'=>$r->timings,
                'doc_gender'=>$r->gender,
                'doc_address'=>$r->address,
                'doc_DOB'=>$r->dob
            ]);
    
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors(['error' => 'An error occurred while updating the information.']);
        }
    
        return redirect()->back()->with('msg', 'Information updated successfully.');
    }

    public function security()
    {
        return view('doctor.security');
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
        return view('doctor.medicine', compact('medicines','medicineCount'));
    }
    public function medicRequest(){
        return view('doctor.medicinerequest');
    }
    public function requestMsg(Request $r){
        $user=auth()->user();
        Messages::create([
            'name'=>$user->name,
            'email'=>$user->email,
            'subject'=>'Medicine Add Request',
            'message'=>'Medicine Name:'.$r->medic_name.'  |  Medicine Dosage:'.$r->dosage.'  |  Medicine Description:'.$r->message,
            'msg_user_id'=>$user->id
        ]);

        return redirect()->back()->with('msg','Request submitted successfully');
    }

    public function viewRequests()
    {
        $user=auth()->user();
        $requests=Messages::where('msg_user_id',$user->id)->get();
        $reqCount=Messages::where('msg_user_id',$user->id)->count();
        return view('doctor.viewrequests',compact('requests','reqCount'));
    }

    public function requestInfo($id){
        $request=Messages::find($id);

        return view('doctor.requestinfo',compact('request'));
    }

    public function allReports()
    {
        $user_id = auth()->user()->id;
        $doctorId = Doctor::where('doc_user_id', $user_id)->value('doctor_id');
        $prescriptions = Prescription::where('presc_doctor_id', $doctorId)->get();
        $medicalReportsWithUsers = [];

        foreach ($prescriptions as $prescription) {
            $user = $prescription->user;
            $medicalReports = MedicalReports::where('mr_prescription_id', $prescription->presc_id)->get();

            foreach ($medicalReports as $report) {
                $medicalReportsWithUsers[] = [
                    'plan_name' => $prescription->plan_name,
                    'report' => $report,
                    'user' => $user
                ];
            }
        }

        return view('doctor.reports', compact('prescriptions', 'medicalReportsWithUsers'));
    }

    public function prescription()
    {
        $conditions=MedicalCondition::get();

        $users=User::with('patient')
            ->join('patients','patients.pat_user_id', '=', 'users.id')
            ->select('patients.*', 'users.name', 'users.email','users.id')
            ->get();
            
        $tests=LabTest::get();

        $medicine=Medication::get();

        $sp=SurgicalProcedure::get();
        
        return view('doctor.prescription',compact('conditions','users','tests','medicine','sp'));
    }
    public function allPrescriptions(){
        $user_id = auth()->user()->id;
        $doctorId = Doctor::where('doc_user_id', $user_id)->value('doctor_id');
        $patients = User::join('prescriptions', 'users.id', '=', 'prescriptions.presc_user_id')
            ->where('prescriptions.presc_doctor_id', $doctorId)
            ->select('users.name','prescriptions.*')
            ->distinct()
            ->get();
        $count = Prescription::where('presc_doctor_id', $doctorId)->count();
        return view('doctor.allprescriptions',compact('count','patients'));
    }
    public function newPlan(Request $r)
    {
        $user = auth()->user();
        $doctorId = Doctor::where('doc_user_id', auth()->user()->id)->value('doctor_id');

        $presc=Prescription::create([
            'presc_user_id' => $r->patient_id,
            'plan_name' => $r->plan_name,
            'start_date' => $r->start_date,
            'end_date' => $r->end_date,
            'presc_doctor_id' => $doctorId,
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
}
