<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Support\Facades\Session;

class HandleLogin extends Controller
{
    public function index () {
        return view('login');
    }

    public function login (Request $request) {
        
        $request -> validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        
        $is_it_doctor = Doctor::where('email', $credentials['email'])->first();
        $is_it_patient = Patient::where('email', $credentials['email'])->first();

        if ($is_it_patient && $is_it_patient -> password === $credentials['password']) {
            
            Session::put('id', $is_it_patient -> id);
            Session::put('username', $is_it_patient -> username);
            Session::put('role', 'patient');

            return redirect() -> route('profile.patient', ['username' => $is_it_patient -> username]);
        
        } else if ($is_it_doctor && $is_it_doctor -> password === $credentials['password']) {
        
            Session::put('id', $is_it_doctor -> id);
            Session::put('username', $is_it_doctor -> username);
            Session::put('role', 'doctor');
        
            return redirect() -> route('profile.doctor', ['username' => $is_it_doctor -> username]);
        
        } else {

        }

    }

    public function logout (Request $request) {
        Session::flush();
        $request->session()->regenerate();
        return redirect() -> route('login');
    }
}