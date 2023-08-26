<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\patient;
use App\Models\LabTest;
use App\Models\medication;
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
        // $medicines=medication::get();
        return view('admin.medication');
        // $medicines=medication::get();
        // return view('admin.medication',compact('medicines'));
    }
    public function labtest() {
        $tests=LabTest::get();
        return view('admin.labtest',compact('tests'));
    }
    public function surgeries() {
        return view('admin.surgeries');
    }
    public function userdata(){

    //     $users = patient::with('user')->join('users', 'patients.user_id', '=', 'users.id')
    // ->select('patients.*', 'users.name', 'users.email')->get();
    
    $users=User::with('patient')->join('patients','patients.user_id', '=', 'users.id')
    ->select('patients.*', 'users.name', 'users.email')->get();
    $ages = [];
    // dd($users);
    foreach ($users as $user) {
            $age = Carbon::parse($user->DOB)->age;
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
