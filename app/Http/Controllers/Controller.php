<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Messages;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index(){

        $doctor = Doctor::with('user')->whereHas('user', function($query) {
            $query->where('is_active', 1);
        })->first();

        $excludedDoctorId = $doctor->user->id;

        // dd($excludedDoctorId);

        $doctors = Doctor::with('user')->whereHas('user', function($query) {
            $query->where('is_active', 1);
        })->whereNotIn('doc_user_id', [$excludedDoctorId])->get();

        // dd($doctors);

        return view('index',compact('doctors','doctor'));
    }

    public function message(Request $r){
        Messages::create([
            'name'=>$r->name,
            'email'=>$r->email,
            'subject'=>$r->subject,
            'message'=>$r->message
        ]);
        return redirect()->back()->with('msg','You message has been sent.');
    }
}
