<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function home(){
        $user_id=auth()->user()->id;
        $count = Prescription::where('presc_doc_id', $user_id)->count();
        return view('doctor.home',compact('count'));
    }
}
