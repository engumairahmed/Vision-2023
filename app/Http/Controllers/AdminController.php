<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Patient;
use App\Models\LabTest;
use App\Models\Medication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    //
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function profile(){
        return view('admin.profile');
    }
    public function security(){
        return view('admin.security');
    }
    public function medication() {
        return view('admin.medication');
    }
    public function addMedicationForm(){
        return view('admin.management.add-medication');
    }
    public function addMedication(Request $r){
        $medicine=Medication::create([
            'medicine'=>$r->medic_name,
            'dosage'=>$r->dosage,
            'medic_description'=>$r->description,
        ]);
    }
    public function labtest() {
        $tests=LabTest::get();
        return view('admin.labtest',compact('tests'));
    }
    public function surgeries() {
        return view('admin.surgeries');
    }
    public function userdata(){

    
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
