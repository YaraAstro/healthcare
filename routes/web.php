<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\HandleLogin;
use App\Http\Controllers\ManageAppointment;
use App\Http\Controllers\HandleDoctor;
use App\Http\Controllers\HandlePatient;
use App\Http\Controllers\ManageDrug;

Route::get('/', function () { 
    return view('index');
}) -> name('home');

Route::get('/about', function () { 
    return view('about');
}) -> name('about');

Route::get('/contact', function () { 
    return view('contact');
}) -> name('contact');

Route::get('/error', function () { 
    return view('error');
}) -> name('error');

Route::get('/login', [HandleLogin::class, 'index']) -> name('login');

Route::post('/login', [HandleLogin::class, 'login']) -> name('login.action');

Route::get('/logout', [HandleLogin::class, 'logout']) -> name('logout');

Route::get('/register', [RegistrationController::class, 'index']) -> name('register');

Route::post('/register', [RegistrationController::class, 'register']) -> name('register.action');

Route::get('/appointment', [ManageAppointment::class, 'index']) -> name('appointment');

Route::post('/appointment/patient', [ManageAppointment::class, 'patient_appo']) -> name('appointment.patient');

Route::post('/appointment/doctor', [ManageAppointment::class, 'doctor_appo']) -> name('appointment.doctor');

Route::get('/appointment/symptoms', [ManageAppointment::class, 'symptoms_form']) -> name('appointment.symptoms');

Route::post('/appointment/symptoms', [ManageAppointment::class, 'patient_symptoms']) -> name('appointment.symptoms.action');

Route::get('/appointment/examine/{id}', [ManageAppointment::class, 'examine_form'])->name('appointment.examine');

Route::post('/appointment/examine', [ManageAppointment::class, 'doctor_examine']) -> name('appointment.examine.action');

Route::get('/doctor/{username}', [HandleDoctor::class, 'index']) -> name('profile.doctor');

Route::get('/patient/{username}', [HandlePatient::class, 'index']) -> name('profile.patient');

Route::get('/product', [ManageDrug::class, 'index']) -> name('show.meds');

// Route::get('/doctor/{username}', function () {
//     return view('profileDoctor');
// });

// Route::get('/patient/{username}', function () {
//     return view('profilePatient');
// });


Route::get('/precscription', function () {
    return view('prescription');
});

Route::get('/payment', function () {
    return view('payment') -> name('payment');
});


Route::get('/product/cart', function () {
    return view('cart');
}) -> name('cart');







