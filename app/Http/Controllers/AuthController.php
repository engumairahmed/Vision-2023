<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{

    public function logout(){
        Auth::logout();
        return redirect()->route('index');
    }

    public function registerPage(){
        return view('auth.register');
    }

    public function register(Request $obj){
        
        $obj->validate([
            'firstName'=>'required|min:3|alpha:ascii',
            'lastName'=>'required|min:3|alpha:ascii',
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

        patient::create([
            'user_id'=>$user->id,
        ]);
        return back()->with(['msg'=>'User Registered']);
    }

    public function updateInfo(Request $r){

        $id=auth()->user()->id;

        $r->validate([
            'name'=>'required|min:3|alpha:ascii',
            'email'=>'required|email|unique:users',
        ]);
        User::where('id', $id)->update([
            'name' => $r->name,
            'email' => $r->email,
        ]);
    }

    public function login(){
        Auth::logout();
        return view('auth.login');
    }

    public function store(Request $r){
        $remember = $r->has('remember');
        if(Auth::attempt(['email'=>$r->email,'password'=>$r->password],$remember)){
            // dd(auth()->user());
            return redirect()->route('admin.dashboard');
        } else{
            $r->validate([
                'email'=>'exists:users,email',
            ]);
            return redirect()->route('login')->withErrors(['fail'=>'Login Failed']);            
        }
    }

    public function forgot(){
        return view('auth.forgot-pass');
    }
    
    public function resetPass(){

    }
}
