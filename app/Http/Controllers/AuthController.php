<?php

namespace App\Http\Controllers;

use App\Mail\PasswordReset;
use App\Models\User;
use App\Models\Patient;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\VerificationMail;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Password as PasswordFacade;

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

        Patient::create([
            'pat_user_id'=>$user->id,
        ]);
        
        $verificationMail= route('verify.email', [
            'id' => $user->getKey(),
            'hash' => sha1($user->getEmailForVerification()),
        ]);
        
        Mail::to($user->email)->send(new VerificationMail($verificationMail));

        return back()->with(['msg'=>'User Registered, Please check your email for account verification ']);
    }

    public function notice(){
        return view('emails.notice');
    }

    public function verifyEmail(Request $request)
    {
        $id = $request->query('id');
        $hash = $request->query('hash');

        $user = User::find($id);

    if ($user && sha1($user->getEmailForVerification()) === $hash) {
        $user->markEmailAsVerified();
        return redirect()->intended('login');
    } else {
        return view('emails.notice');
    }
    }

    public function resend(Request $r)
    {
        if($r->user()!==Null){
            $user = $r->user();

            if ($user->hasVerifiedEmail()) {
                return redirect()->route('login')->with('msg', 'Your account is already verified.');
            }

            $verificationMail= route('verify.email', [
                'id' => $user->getKey(),
                'hash' => sha1($user->getEmailForVerification()),
            ]);
            
            Mail::to($user->email)->send(new VerificationMail($verificationMail));

            return back()->with('msg', 'The verification email has been sent to your registed email address . Please check your inbox.');
        } else{
            return back()->with('msg','Please log in to resend the account verification email.');
        }
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
    
    public function resetLink(Request $r){
        $r->validate([
            'email'=>'exists:users,email',
        ]);

        $email=$r->email;
        $user = User::where('email', $email)->first();
        $token = PasswordFacade::createToken($user);
        $PasswordReset= route('reset.link', [
            'email' => $email,
            'token' => $token,
        ]);
        
        Mail::to($user->email)->send(new PasswordReset($PasswordReset));
        return redirect()->back()->with('msg','A link to reset your pass has been sent to your registered email. Please check your Inbox.');
    }
    public function resetForm(){
        return view('auth.reset-pass');
    }

    public function resetPass(Request $r){
        $email = $r->query('email');
        $token = $r->query('token');
    
        $r->validate([
            'password' => [ 
                'required',
                Password::min(8)
                    ->letters()
                    ->numbers()
            ],
            'confirmpass' => 'same:password',
        ]);
    
        // $user = User::find($id);
        $user = User::where('email', $email)->first();
    
        if ($user && PasswordFacade::tokenExists($user, $token)) {
            $user->update([
                'password' => Hash::make($r->password)                
            ]);
            return redirect()->back()->with('success', 'Password updated successfully');
        }
    
        return redirect()->back()->with('error', 'Invalid reset link. Please try again.');
    }
    
    public function activation(){
        return view('auth.activation');
    }
}
