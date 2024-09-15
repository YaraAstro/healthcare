<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Utils\GenerateID;
use Illuminate\Support\Facades\DB;

class ManageAppointment extends Controller
{

    private function getter () {
        $user_id = session('id');
        $user = session('role') === 'doctor' ? Doctor::find($user_id) : Patient::find($user_id) ;

        return $user;
    }

    public function index () {
        $user = Self::getter();
        return view('appointment', ['user' => $user]);
    }

    public function symptoms_form () {
        $user = Self::getter();
        return view('checkupForm', ['user' => $user]);
    }

    public function examine_form () {
        $user = Self::getter();
        return view('patientInfoForm', ['user' => $user]);
    }

    public function patient_appo(Request $request) {

        // Validate the incoming request data
        $request->validate([
            'patient_id' => 'required|string|size:5|regex:/^PT/',
            'patient_name' => 'nullable|string|max:255',
            'patient_phone' => 'nullable|string|max:15',
            'patient_address' => 'nullable|string',
            'patient_city' => 'nullable|string|max:100',
            'patient_state' => 'nullable|string|max:100',
            'patient_zip' => 'nullable|string|max:10',
            'patient_age' => 'nullable|integer|min:0',
        ]);

        // Get the ID from the session
        $get_id = session('id');

        // Find the patient record by ID
        $patient = Patient::find($get_id);

        // If the patient record is found, update the attributes
        if ($patient) {
            $patient->update([
                'name' => $request->input('patient_name'),
                'mobile' => $request->input('patient_phone'),
                'address' => $request->input('patient_address'),
                'city' => $request->input('patient_city'),
                'state' => $request->input('patient_state'),
                'zip_code' => $request->input('patient_zip'),
                'age' => $request->input('patient_age'),
            ]);

            // Redirect to the profile route after updating
            // return redirect()->route('profile.patient', ['username' => session('username')]);
            return redirect() -> route('appointment.symptoms');
        } else {
            // Handle the case where the patient record is not found
            return redirect()->back()->withErrors(['error' => 'Patient Update Failed !']);
        }
    }


    public function doctor_appo(Request $request) {

        $request->validate([
            'doctor_id' => 'required|string|size:5|regex:/^DC/', 
            'doctor_name' => 'nullable|string|max:255',
            'speciality' => 'nullable|string|max:255',
            'doctor_email' => 'required|string|email|max:100',
        ]);

        $get_id = session('id');

        $updated = Doctor::where('id', $get_id)->update([
            'name' => $request->input('doctor_name', DB::raw('name')),
            'speciality' => $request->input('speciality', DB::raw('speciality')),
            'email' => $request->input('doctor_email', DB::raw('email')),
        ]);

        if ($updated) {
            return redirect()->route('profile.doctor', ['username' => session('username')])
                            ->with('success', 'Doctor details updated successfully.');
        } else {
            return redirect()->back()->withErrors(['error' => 'Doctor Update Failed !']);
        }
    }


    public function patient_symptoms (Request $request) {

        $request -> validate([]);
        
        $new_id = GenerateID::generateId('AP');

    }

    public function doctor_examine (Request $request) {
        
        $request -> validate([]);
        
        $new_id = GenerateID::generateId('PR');

    }

}
