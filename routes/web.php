<?php

use Illuminate\Support\Facades\Route;
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
});
// Route::get('/login')
Route::controller(PatientController::class)->group(function(){

    Route::get('/patient','home')->name('home');
    // Route::post('/','add_user2');
    // Route::get('/show','show_user')->name('show');
    // Route::get('/delete/{id}','delete_std');
    // Route::get('/update/{id}','update_std');
    // Route::post('/update/{id}','update_std2');


});

Route::controller(DoctorController::class)->group(function(){

    Route::get('/doctor','home')->name('home');
    // Route::post('/','add_user2');
    // Route::get('/show','show_user')->name('show');
    // Route::get('/delete/{id}','delete_std');
    // Route::get('/update/{id}','update_std');
    // Route::post('/update/{id}','update_std2');


});

Route::controller(AdminController::class)->group(function(){

    Route::get('/admin','home')->name('home');
    // Route::post('/','add_user2');
    // Route::get('/show','show_user')->name('show');
    // Route::get('/delete/{id}','delete_std');
    // Route::get('/update/{id}','update_std');
    // Route::post('/update/{id}','update_std2');


});
