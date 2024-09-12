<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utils\GenerateID;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Support\Facades\Log;

class RegistrationController extends Controller
{
    public function register (Request $request) {

        $request->validate([
            'username' => 'required|string|max:50|unique:patient,username|unique:doctor,username',
            'email' => 'required|string|email|max:100|unique:patient,email|unique:doctor,email',
            'password' => 'required|string|min:8',
            'role' => 'required|string|in:doctor,patient',
        ]);

        $data = $request->only('username', 'email', 'password');

        try {

            if ($request->role === 'doctor') {
                $data['id'] = GenerateID::generateId('DC');
                Doctor::create($data);
            } else {
                $data['id'] = GenerateID::generateId('PT');
                Patient::create($data);
            }
    
            return redirect()->back()->with('success', 'Registration successful');
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
