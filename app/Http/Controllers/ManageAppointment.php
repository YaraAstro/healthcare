<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Utils\GenerateID;

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

    public function patient_appo (Request $request) {
        
        $request -> validate([
            'patient_id' => 'required|string|size:5|regex:/^PT/',
            'patient_name' => 'nullable|string|max:255',
            'patient_phone' => 'nullable|string|max:15',
            'patient_address' => 'nullable|string',
            'patient_city' => 'nullable|string|max:100',
            'patient_state' => 'nullable|string|max:100',
            'patient_zip' => 'nullable|string|max:10',
            'patient_age' => 'nullable|integer|min:0',
        ]);

        $get_id = $request -> input('patient_id');

        $row = Patient::find($get_id);

        $row -> name = $request -> input('patient_name');
        $row -> mobile = $request -> input('patient_phone');
        $row -> address = $request -> input('patient_address');
        $row -> city = $request -> input('patient_city');
        $row -> state = $request -> input('patient_state');
        $row -> zip_code = $request -> input('patient_zip');
        $row -> age = $request -> input('patient_age');

        $row -> save();

    }

    public function doctor_appo (Request $request) {
        
        $request -> validate([
            'doctor_id' => 'required|string|size:5|regex:/^DC/', 
            'doctor_name' => 'nullable|string|max:255',
            'speciality' => 'nullable|string|max:255',
            'doctor_email' => 'required|string|email|max:100|unique:doctor,email' . $request->input('doctor_id'),,
        ]);

        $get_id = $request -> input('doctor_id');

        $row = Doctor::find($get_id);

        $row -> name = $request -> input('doctor_name');
        $row -> speciality = $request -> input('speciality');
        $row -> email = $request -> input('doctor_email');

        $row -> save();

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
