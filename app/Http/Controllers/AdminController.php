<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\LabTest;
use App\Models\Patient;
use App\Models\Medication;
use App\Models\Prescription;
use App\Models\SurgicalProcedure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        $userCount = User::whereNull('is_admin')->whereNull('is_doctor')->count();
        $doctorCount = User::whereNull('is_admin')->where('is_doctor',1)->count();
        $presc_count = Prescription::count();
        
        return view('admin.dashboard',compact('userCount','doctorCount','presc_count'));
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function security()
    {
        return view('admin.security');
    }

    public function medication()
    {
        $medicines = medication::all();
        $medicineCount = medication::count();
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


    public function showSp()
    {

    }

    public function userdata()
    {    
        $users=User::with('Patient')->join('patients','patients.pat_user_id', '=', 'users.id')
        ->select('patients.*', 'users.name', 'users.email')->get();
        $ages = [];
        // dd($users);
        foreach ($users as $user) {
                $age = Carbon::parse($user->pat_DOB)->age;
                $ages[$user->patient_id] = $age;
                }
                // dd($ages);
            return view('admin.users',compact('users','ages'));
    }

    public function docData()
    {    
        $users=User::with('Doctor')->join('doctors','doctors.doc_user_id', '=', 'users.id')
        ->select('*')->get();
        $ages = [];
        // dd($users);
        foreach ($users as $user) {
                $age = Carbon::parse($user->doc_DOB)->age;
                $ages[$user->doctor_id] = $age;
                }
                // dd($ages);
            return view('admin.doctors',compact('users','ages'));
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
    
}
