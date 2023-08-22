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


Route::controller(AuthController::class)->group(function(){
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
        Route::prefix('admin/')->group(function(){

            // Route::post('/','add_user2');
            // Route::get('/show','show_user')->name('show');
            // Route::get('/delete/{id}','delete_std');
            // Route::get('/update/{id}','update_std');
            // Route::post('/update/{id}','update_std2');


        });
    });
});
