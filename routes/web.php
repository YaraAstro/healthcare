<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

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







