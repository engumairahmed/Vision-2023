<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
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

// Route::get('/login')


Route::controller(AuthController::class)->middleware(['web'])->group(function(){
    Route::get('/logout','logout')->name('logout');
    Route::get('/login','login')->name('login');
    Route::post('/login','store');
    Route::get('/register','registerPage')->name('register');
    Route::post('/register','register');
    Route::get('/forgot-password','forgot')->name('forgot');
    Route::post('/forgot-password','forgotPass');
});

Route::middleware(['auth','patient'])->group(function(){

    Route::controller(PatientController::class)->group(function(){

        Route::get('/patient','home')->name('patient.home');

        Route::get('/prescriptions','prescription')->name('prescriptions');

        Route::post('/prescriptions','newPlan');

        Route::get('profile','profile')->name('patient.profile');
        Route::get('security','security')->name('patient.security');
       
        Route::prefix('patient/')->group(function(){


            // Route::post('/','add_user2');
            // Route::get('/show','show_user')->name('show');
            // Route::get('/delete/{id}','delete_std');
            // Route::get('/update/{id}','update_std');
            // Route::post('/update/{id}','update_std2');
            
        });



    });
});
Route::middleware(['auth','doctor'])->group(function(){

    Route::controller(DoctorController::class)->group(function(){

        Route::get('/doctor','home')->name('doctor.home');
            Route::prefix('doctor/')->group(function(){

            // Route::post('/','add_user2');
            // Route::get('/show','show_user')->name('show');
            // Route::get('/delete/{id}','delete_std');
            // Route::get('/update/{id}','update_std');
            // Route::post('/update/{id}','update_std2');

        });

    });
});

Route::middleware(['auth','admin'])->group(function(){

    Route::controller(AdminController::class)->group(function(){

        Route::get('/admin','dashboard')->name('admin.dashboard');

        Route::get('/admin/search','search')->name('admin.search');

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

            // Route::post('/','add_user2');
            // Route::get('/show','show_user')->name('show');
            // Route::get('/delete/{id}','delete_std');
            // Route::get('/update/{id}','update_std');
            // Route::post('/update/{id}','update_std2');


        });


        Route::prefix('admin')->group(function(){

            
        Route::get('profile','profile')->name('admin.profile');
        Route::get('security','security')->name('admin.security');
        Route::get('users','userdata')->name('admin.users');
        Route::get('doctors','docData')->name('admin.doctors');

            // Route::post('/','add_user2');
            // Route::get('/show','show_user')->name('show');
            // Route::get('/delete/{id}','delete_std');
            // Route::get('/update/{id}','update_std');
            // Route::post('/update/{id}','update_std2');


        });
    });
});
