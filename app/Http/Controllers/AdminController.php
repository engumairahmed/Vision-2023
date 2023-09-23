<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Vitals;
use App\Models\LabTest;
use App\Models\Patient;
use App\Models\Messages;
use App\Models\Medication;
use App\Models\Prescription;
use Illuminate\Http\Request;
use App\Models\SurgicalProcedure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;


class AdminController extends Controller
{
    //
    public function dashboard()
    {
        $userCount = User::whereNull('is_admin')->whereNull('is_doctor')->count();
        $doctorCount = User::whereNull('is_admin')->where('is_doctor',1)->count();
        $presc_count = Prescription::count();
        $queryCount = Messages::where('created_at', '>', now()->subDays(1))->count();

        
        return view('admin.dashboard',compact('userCount','doctorCount','presc_count','queryCount'));
    }

    public function profile()
    {
        $user=User::Find(auth()->user()->id);
        return view('admin.profile',compact('user'));
    }

    public function updateInfo(Request $r){
        $id = auth()->user()->id;
    
        $r->validate([
            'name'=>'required|min:3',
            'email'=>'required|email|unique:users,email,'.$id,
            'image'=>'image|mimes:jpeg,png,jpg,gif|max:3072|dimensions:min_width=200,min_height=200,max_width=1000,max_height=1000,ratio=1/1'
        ]);
    
        DB::beginTransaction();
    
        try {
            if ($r->hasFile('image')) {
                $oldImage = User::where('id', $id)->value('profile_pic');
                if($oldImage){
                if (Storage::exists($oldImage)) {                
                    Storage::delete($oldImage);
                }}
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
    
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors(['error' => 'An error occurred while updating the information.']);
        }
    
        return redirect()->back()->with('msg', 'Information updated successfully.');
    }

    public function security()
    {
        return view('admin.security');
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

    public function medication()
    {
        $medicines = Medication::all();
        $medicineCount = Medication::count();
        return view('admin.management.medication',compact('medicines','medicineCount'));
    }

    public function addMedicationForm()
    {
        return view('admin.management.add-medication');
    }

    public function addMedication(Request $r)
    {
        DB::table('medications')->insert([
            'medicine' => $r->medic_name,
            'dosage' => $r->dosage,
            'medic_description' => $r->description,
        ]);
        return redirect()->back()->with('msg','Medicine added');
    }

    public function labtest()
    {
        $tests=LabTest::get();
        $testCount=LabTest::count();
        return view('admin.management.labtest',compact('tests','testCount'));
    }

    public function addLabtestForm()
    {
        return view('admin.management.add-labtest');
    }

    public function addLabTest(Request $r)
    {
        DB::table('lab_tests')->insert([
            'test_name' => $r->test_name,
            'test_description' => $r->description,
        ]);
        return redirect()->back()->with('msg','Medical Test added');
    }

    public function surgeries()
    {
        $sp=SurgicalProcedure::all();
        $spCount=SurgicalProcedure::count();
        return view('admin.management.surgeries',compact('sp','spCount'));
    }

    public function addSpForm()
    {
        return view('admin.management.add-procedure');
    }

    public function addSp(Request $r)
    {
        DB::table('surgical_procedures')->insert([
            'sp_name' => $r->sp_name,
            'sp_description' => $r->description,
        ]);
        return redirect()->back()->with('msg','Surgical Procedure added');
    }


    public function showSp($id)
    {
        $sp=SurgicalProcedure::find($id);
        return view('doctor.sp-details',compact('sp'));
    }

    public function deleteSp($id)
    {
        $sp=SurgicalProcedure::find($id);
        // dd($sp);
        $sp->delete();
        return redirect()->back()->with('msg','Procedure Deleted Successfully');
    }

    public function userdata()
    {    
        $users=User::with('Patient')->join('patients','patients.pat_user_id', '=', 'users.id')
        ->select('patients.*','users.id', 'users.name', 'users.email','users.email_verified_at','users.is_active')->get();
        $ages = [];
        foreach ($users as $user) {
                $age = Carbon::parse($user->pat_DOB)->age;
                $ages[$user->patient_id] = $age;
                }
            return view('admin.users',compact('users','ages'));
    }

    public function viewUser($id){
        $user=User::find($id);
        $presc_count = Prescription::where('presc_user_id', $id)->count();
        $vitalsCount=Vitals::where('vital_user_id',$id)->count();
        $patientData = $user->patient;
        $reportCount = $user->medicalReports->sum(function ($prescription) {
            return $prescription->medicalReports->count();
        });

        return view('admin.userinfo',compact('user','presc_count','reportCount','vitalsCount','patientData'));
    }

    public function enable($id){
        $user=User::find($id);
        $user->is_active=1;
        $user->update();
        return redirect()->back()->with('success','User activated.');
    }

    public function disable($id){
        $user=User::find($id);
        $user->is_active=0;
        $user->update();
        return redirect()->back()->with('success','User deactivated.');
    }

    public function docData()
    {    
        $users=User::with('Doctor')->join('doctors','users.id', '=', 'doctors.doc_user_id')
        ->select('doctors.*', 'users.name', 'users.email','users.id','users.email_verified_at','users.is_active')->get();
        $ages = [];
        foreach ($users as $user) {
                $age = Carbon::parse($user->doc_DOB)->age;
                $ages[$user->doctor_id] = $age;
                }
            return view('admin.doctors',compact('users','ages'));
    }
    public function viewDoc($id){

        $user=User::find($id);

        $doctor = Doctor::where('doc_user_id', $user->id)->first();

        $presc_count = Prescription::where('presc_doctor_id', $id)->count();
        
        return view('admin.doctorinfo',compact('user','presc_count','doctor'));
    }

     public function search(Request $request)
    {
        $query = $request->input('query');
        $viewsDirectory = resource_path('views/admin');

        $matchingViews = [];

        $files = File::allFiles($viewsDirectory);

        foreach ($files as $file) {
            $filePath = $file->getRelativePathname();

            if (str_contains($filePath, $query)) {
                $matchingViews[] = $filePath;
            }
        }

        return view('admin.search', compact('matchingViews', 'query'));
    }

    public function queries(){
        $queries=Messages::all();
        $queriesCount=Messages::count();
        return view('admin.queries',compact('queries','queriesCount'));
    }

    public function msg($id){
        $message=Messages::find($id);

    return view('admin.message',compact('message'));
    }
    
}
