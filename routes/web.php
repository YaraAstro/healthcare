<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\HandleLogin;
use App\Http\Controllers\ManageAppointment;

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/login', [HandleLogin::class, 'index']) -> name('login');

Route::post('/login', [HandleLogin::class, 'login']) -> name('login.action');

Route::get('/register', [RegistrationController::class, 'index']) -> name('register');

Route::post('/register', [RegistrationController::class, 'register']) -> name('register.action');

Route::get('/appointment', [ManageAppointment::class, 'index']) -> name('appointment');

Route::post('/appointment', [ManageAppointment::class, 'patient_appo']) -> name('appointment.patient');

Route::post('/appointment', [ManageAppointment::class, 'doctor_appo']) -> name('appointment.doctor');

// Route::get('/appointment', function () {
//     return view('appointment');
// });

// Route::get('/appointment/symptom', function () {
//     return view('checkupForm');
// });

// Route::get('/appointment/examine', function () {
//     return view('patientInfoForm');
// });


Route::get('/profile/doctor', function () {
    return view('profileDoctor');
});

Route::get('/profile/patient', function () {
    return view('profilePatient');
});


Route::get('/precscription', function () {
    return view('prescription');
});

Route::get('/payment', function () {
    return view('payment');
});

Route::get('/product', function () {
    return view('products');
});

Route::get('/product/cart', function () {
    return view('cart');
});







