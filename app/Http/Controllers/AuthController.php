<?php

namespace App\Http\Controllers;

use App\Models\patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function registerPage(){
        return view('auth.register');
    }
    public function register(Request $obj){
        
        $obj->validate([
            'firstName'=>'required|min:3|alpha:ascii',
            'lastName'=>'min:3|alpha:ascii',
            'email'=>'required|email|unique:users',
            'password' => [ 'required',
                            Password::min(8)
                                    ->letters()
                                    ->numbers()],
            'confirmpass' => 'same:password',
        ]);
        
        $user=User::create([
            'name'=>$obj->firstName." ".$obj->lastName,
            'email'=>$obj->email,
            'password'=>Hash::make($obj->password),
        ]);

        // dd($user);
        patient::create([
            'user_id'=>$user->id,
        ]);
        // dd($user);
        // return redirect()->route('login');
        // return view('auth.login');
        return back()->with(['msg'=>'User Registered']);
    }
    public function login(){
        return view('auth.login');
    }
    public function store(Request $r){
        if(Auth::attempt(['email'=>$r->email,'password'=>$r->password])){
            dd(auth()->user());
            // return redirect()->route('admin.dashboard');
        }
    }
    public function forgot(){
        return view('auth.forgot-pass');
    }
    public function resetPass(){

    }
}
