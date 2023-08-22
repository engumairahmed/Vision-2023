<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }
    public function create(Request $obj){
        $obj->validate([
            'name'=>'required|min:3',
            'email'=>'required|email',
            'password' => [ 'required',
                            Password::min(8)
                                    ->letters()
                                    ->numbers()],
        ]);
        User::create([
            'st_name'=>$obj->name,
            'st_email'=>$obj->email,
            'st_password'=>Hash::make($obj->password),
        ]);
        return back()->with(['msg'=>'User Registered']);
    }
    public function login(){
        return view('auth.login');
    }
    public function store(Request $r){
        // if(Auth::attempt())
        // $r->email
    }
    public function forgot(){
        return view('auth.forgot-pass');
    }
    public function resetPass(){

    }
}
