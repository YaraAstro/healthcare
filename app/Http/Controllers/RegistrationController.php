<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utils\GenerateID;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Support\Facades\Log;

class RegistrationController extends Controller
{

    public function index () {
        return view('register');
    }

    public function register (Request $request) {

        $request->validate([
            'username' => 'required|string|max:50|unique:patient,username|unique:doctor,username',
            'email' => 'required|string|email|max:100|unique:patient,email|unique:doctor,email',
            'password' => 'required|string|min:8',
            'selected_role' => 'required|string|in:doctor,patient',
        ]);

        // $data = $request->only('username', 'email', 'password');

        try {

            $new_id = $request->selected_role === 'doctor' ? GenerateID::generateId('DC') : GenerateID::generateId('PT');

            $data = [
                'id' => $new_id,
                'username' => $request -> input('username'),
                'email' => $request -> input('email'),
                'password' => $request -> input('password'),
            ];

            if ($request->selected_role === 'doctor') {
                Doctor::create($data);
            } else {
                Patient::create($data);
            }

            session([
                'role' => $request -> selected_role,
                'id' => $new_id,
                'username' => $request -> input('username'), 
            ]);
    
            return redirect() -> route('profile.patient', ['username' => session('username')]);
            
        } catch (\Exception $e) {
            
            Log::error('Registration error', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            return redirect()->back()->withErrors(['error' => 'An error occurred during registration. Please try again.']);

        }

    }
}