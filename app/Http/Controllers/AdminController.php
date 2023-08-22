<?php

namespace App\Http\Controllers;

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
}
