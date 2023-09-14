<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Prescription;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function home(){
        $user_id=auth()->user()->id;
        $count = Prescription::where('presc_doctor_id', $user_id)->count();
        $patients = User::whereHas('prescriptions', function($query) use ($user_id) {
            $query->where('presc_doctor_id', $user_id);
        })->get();
        return view('doctor.home',compact('count','patients'));
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
}
