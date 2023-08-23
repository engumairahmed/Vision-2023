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

        $users = patient::with('user')->join('users', 'patients.user_id', '=', 'users.id')
    ->select('patients.*', 'users.name', 'users.email')->get();

        // $users=User::get();
        // dd($users[0]);
        $ages = [];
        foreach ($users as $user) {
            $age = Carbon::parse($user->user->DOB)->age;
            $ages[$user->id] = $age;
                //  $users->age = Carbon::parse($users->patients->DOB)->age;
            }
            // dd();
            // dd($user->patient_id);
        return view('admin.users',compact('users','ages'));
    }
}
