<?php

namespace App\Http\Controllers;

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
        
        $user = $r->user();

        if ($user->hasVerifiedEmail()) {
            return redirect()->route('login')->with('msg', 'Your account is already verified.');
        }

        $verificationMail= route('verify.email', [
            'id' => $user->getKey(),
            'hash' => sha1($user->getEmailForVerification()),
        ]);
        
        Mail::to($user->email)->send(new VerificationMail($verificationMail));

        return back()->with('msg', 'Verification email sent. Please check your email.');
    }


    public function updateInfo(Request $r){
        $id = auth()->user()->id;
    
        $r->validate([
            'name'=>'required|min:3',
            'email'=>'required|email|unique:users,email,'.$id,
            'image'=>'image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);
    
        DB::beginTransaction();
    
        try {
            
            if ($r->hasFile('image')) {
                $image = $r->file('image');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $path = public_path('files/images');
                $image->move($path, $imageName);
            }

            User::where('id', $id)->update([
                'name' => $r->name,
                'email' => $r->email,
                'profile_pic'=>'files/images/'.$imageName,
            ]);
            Patient::where('pat_user_id', $id)->update([
                'father_name'=>$r->fatherName,
                'pat_gender'=>$r->gender,
                'pat_contact'=>$r->contact,
                'pat_address'=>$r->address,
                'pat_DOB'=>$r->dob,
                'blood_group'=>$r->bloodGroup
            ]);
    
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors(['error' => 'An error occurred while updating the information.']);
        }
    
        return redirect()->back()->with('msg', 'Information updated successfully.');
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
