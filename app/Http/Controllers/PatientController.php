<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function home(){
        return view('patient.home');
    }
    public function prescription(){
        return view('patient.prescription');
    }
}
