<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\HandleLogin;

Route::get('/', function () {
    return view('index');
});

Route::get('/login', [HandleLogin::class, 'index']) -> name('login');

Route::post('/login', [HandleLogin::class, 'login']) -> name('login.action');

Route::get('/register', [RegistrationController::class, 'index']) -> name('register');

Route::post('/register', [RegistrationController::class, 'register']) -> name('register.action');

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/profile/doctor', function () {
    return view('profileDoctor');
});

Route::get('/profile/patient', function () {
    return view('profilePatient');
});

Route::get('/appointment', function () {
    return view('appointment');
});

Route::get('/appointment/symptom', function () {
    return view('checkupForm');
});

Route::get('/appointment/examine', function () {
    return view('patientInfoForm');
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







