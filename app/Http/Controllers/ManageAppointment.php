<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Utils\GenerateID;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Drug;
use App\Models\Prescription;

class ManageAppointment extends Controller
{

    private function getter () {
        $user_id = session('id');
        $user = session('role') === 'doctor' ? Doctor::find($user_id) : Patient::find($user_id) ;

        return $user;
    }

    private function get_appo_of_patient ($appo_id) {
        $appo = Appointment::find($appo_id);
        $patient = Patient::find($appo -> patient_id);

        $data = [
            'id' => $appo -> id,
            'name' => $patient -> name,
            'patient_id' => $patient -> id,
            'age' => $patient -> age,
            'email' => $patient -> email,
            'symptoms' => $appo -> symptoms,
            'description' => $appo -> description ,
        ];

        return $data;
    }

    private function calc_price ($drug_list) {
        $total = 0; 
        foreach ($drug_list as $drug) {
            $total += Drug::find($drug) -> amount;
        } ;
        return $total;
    }

    public function index () {
        $user = Self::getter();
        return view('appointment', ['user' => $user]);
    }

    public function symptoms_form() {
        $user = Self::getter(); 
        $doctors = Doctor::all(); // Fetch all doctors from the database
        $doctorsList = $doctors->pluck('id', 'name')->toArray(); // Create a key-value array
    
        return view('checkupForm', ['user' => $user, 'doctors' => $doctorsList]);
    }    

    public function examine_form ($id) {
        $user = Self::get_appo_of_patient($id);
        $med = Drug::all();
        return view('patientInfoForm', ['user' => $user, 'med' => $med]);
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
            return redirect()->route('profile.doctor', ['username' => session('username')]);
        } else {
            return redirect()->back()->withErrors(['error' => 'Doctor Update Failed !']);
        }
    }

    public function patient_symptoms(Request $request) {
        $request -> validate([
            'symptoms' => 'required|string|max:1000',
            'description' => 'required|string|max:1000',
            'patient_id' => 'required|string|size:5|regex:/^PT/',
            'doctor_id' => 'required|string|size:5|regex:/^DC/',
            'pik_date' => 'required|date',
        ]);

        try {
            // Generate a new ID
            $new_id = GenerateID::generateId('AP');
            
            // Prepare the data for the new appointment
            $data = [
                'id' => $new_id,
                'symptoms' => $request->input('symptoms'),
                'description' => $request->input('description'),
                'patient_id' => $request->input('patient_id'),
                'doctor_id' => $request->input('doctor_id'),
                'date' => $request->input('pik_date'),
                'status' => 'pending',
            ];

            // Create the new appointment
            Appointment::create($data);

            // Redirect to the patient profile
            return redirect()->route('profile.patient', ['username' => session('username')]);
        } catch (\Exception $e) {
            // Log the error
            Log::error('Registration error', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            // Redirect back with error message
            return redirect()->back()->withErrors(['error' => 'Can\'t make an appointment now!']);
        }
    }

    public function doctor_examine(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'patient_id' => 'required|string|size:5|regex:/^PT/',
            'doctor_id' => 'required|string|size:5|regex:/^DC/',
            'appo_id' => 'required|string',
            'drug_list' => 'required|json',
        ]);
        
        // Generate a new prescription ID
        $new_id = GenerateID::generateId('PR');
        
        // Decode the drug list JSON into an array
        $med_list = json_decode($request->input('drug_list'), true);
        
        // Calculate the total amount for the prescribed drugs
        $amount = $this->calc_price($med_list);

        // Prepare the data for the new prescription
        $data = [
            'id' => $new_id,
            'patient_id' => $request->input('patient_id'),
            'doctor_id' => $request->input('doctor_id'),
            'appo_id' => $request->input('appo_id'),
            'drugs' => json_encode($med_list), // Ensure drugs are saved as JSON
            'amount' => $amount,
            'status' => 'pending',
        ];

        // Create a new prescription
        Prescription::create($data);
        
        // Update the appointment status to "done"
        Appointment::where('id', $request->input('appo_id'))->update(['status' => 'done']);

        // Redirect to the prescription route (make sure the route name is correct)
        return redirect()->route('prescription', ['id' => $new_id]);
    }


}
