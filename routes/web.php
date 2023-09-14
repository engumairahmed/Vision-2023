<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\PatientController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('index');

// Auth::routes([
//     'verify'=>true
// ]);

Route::post('/',[Controller::class,'message']);

// Google URL
Route::controller(GoogleController::class)->group(function(){
    Route::prefix('/google')->group( function(){
        Route::get('/login','loginWithGoogle')->name('google-login');
        Route::any('/callback','callbackFromGoogle')->name('callback');
    });
});

Route::controller(AuthController::class)->middleware(['web'])->group(function(){
    Route::get('/logout','logout')->name('logout');
    Route::get('/login','login')->name('login');
    Route::post('/login','store');
    Route::get('/register','registerPage')->name('register');
    Route::post('/register','register');
    Route::get('/password/forgot','forgot')->name('forgot');
    Route::post('/password/forgot','resetLink');
    Route::get('/password/reset','resetForm')->name('reset.link');
    Route::post('/password/reset','resetPass');
    Route::get('/email/verify', 'verifyEmail')->name('verify.email');
    Route::get('/email/resend','resend')->name('resend.verification');
    Route::get('/email/notice','notice')->name('verification.notice');
    Route::get('/email','email')->name('emails.verification');
    Route::get('/account-activation','activation')->name('activation.request');
});

Route::middleware(['active','auth','patient','verified'])->group(function(){

    Route::controller(PatientController::class)->group(function(){

        
        
        Route::prefix('/patient')->group(function(){

            Route::get('/','home')->name('patient.home');
            
            Route::get('/prescriptions','prescription')->name('prescriptions');    
            Route::post('/prescriptions','newPlan');
    
            Route::get('/account/profile','profile')->name('patient.profile');
            Route::post('/account/profile','updateInfo');        
    
            Route::get('/account/security','security')->name('patient.security');
            Route::post('/account/security','updatePass');

            Route::get('/history','history')->name('history');

            Route::get('/medicines','medication')->name('user.medicines');
            
            Route::get('/vitals','vital')->name('patient.vital');
            Route::post('/vitals','vitalCreate')->name('patient.vital');
            Route::get('/vitals/history','vitalHistory')->name('patient.vitalhistory');
            
            
            Route::get('/plan/{id}','planInfo')->name('user.plan');

            Route::get('/reports','allReports')->name('user.reports');
            Route::get('/reports/delete/{id}','deleteReport');
            
            Route::get('/upload-reports','reports')->name('user.add-reports');
            Route::post('/upload-reports','addReport');
            
        });




    });
});
Route::middleware(['active','auth','doctor','verified'])->group(function(){

    Route::controller(DoctorController::class)->group(function(){

        Route::prefix('/doctor')->group(function(){

            Route::get('/','home')->name('doctor.home');
            
            Route::get('/profile','profile')->name('doctor.profile');

        });

    });
});

Route::middleware(['active','auth','admin','verified'])->group(function(){

    Route::controller(AdminController::class)->group(function(){

       
        Route::prefix('/admin/management')->group(function(){

            Route::get('/medication','medication')->name('admin.medication');
            Route::get('/add-medication','addMedicationForm')->name('admin.add-medication');
            Route::post('/add-medication','addMedication');

            Route::get('/lab-test','labtest')->name('admin.labtest');
            Route::get('/add-labtest','addLabtestForm')->name('admin.lab-test');
            Route::post('/add-labtest','addLabTest');

            Route::get('/surgical-procedures','surgeries')->name('admin.surgeries');
            Route::get('/add-procedures','addSpForm')->name('admin.add-sp');
            Route::post('/add-procedures','addSp');
            Route::get('/surgical-procedure/{id}','showSp')->name('admin.showSp');

        });


        Route::prefix('/admin')->group(function(){

            Route::get('/','dashboard')->name('admin.dashboard');

            Route::get('/queries','queries')->name('admin.queries');
            Route::get('/queries/message/{id}','msg');

            Route::get('/users/activate/{id}','enable')->name('enable.user');
            Route::get('/users/deactivate/{id}','disable')->name('disable.user');

            Route::get('/users/id/{id}','viewUser')->name('view.user');

            Route::get('/profile','profile')->name('admin.profile');
            Route::get('/security','security')->name('admin.security');
            Route::get('/users','userdata')->name('admin.users');
            Route::get('/doctors','docData')->name('admin.doctors');

            // Route::post('/','add_user2');
            // Route::get('/show','show_user')->name('show');
            // Route::get('/delete/{id}','delete_std');
            // Route::get('/update/{id}','update_std');
            // Route::post('/update/{id}','update_std2');


        });
    });
});
