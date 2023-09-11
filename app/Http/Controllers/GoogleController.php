<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function loginWithGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackFromGoogle()
    {
        try {
            $user = Socialite::driver('google')->user();

            // Check Users Email If Already There
            $is_user = User::where('email', $user->getEmail())->first();
            if(!$is_user){

                $saveUser = User::updateOrCreate([
                    'gauth_id' => $user->getId(),
                ],[
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'gauth_type'=> 'google',
                    'password' => Hash::make($user->getName().'@'.$user->getId()),
                    'email_verified_at'=>now(),

                ]);
                Patient::create([
                    'pat_user_id'=>$user->id,
                ]);
            }else{
                $saveUser = User::where('email',  $user->getEmail())->update([
                    'gauth_id' => $user->getId(),
                ]);
                $saveUser = User::where('email', $user->getEmail())->first();
            }


            Auth::loginUsingId($saveUser->id);

            return redirect()->route('admin.dashboard');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
