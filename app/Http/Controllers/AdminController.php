<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\patient;
use Illuminate\Http\Request;

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
    public function labtest() {
        return view('admin.labtest');
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

    
}
