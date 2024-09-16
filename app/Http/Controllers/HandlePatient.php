<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Doctor;

class HandlePatient extends Controller
{
    private function assembleAppo($appo_query) {
        $list = [];
        foreach ($appo_query as $this_appo) {
            $doctor = Doctor::find($this_appo->doctor_id)->name;
            $data = [
                'id' => $this_appo->id,
                'doctor' => $doctor,
                'date' => $this_appo->date,
                'status' => $this_appo->status,  
            ];
            $list[] = $data; // Using array syntax to add elements
        }
        return $list;
    }
    
    
    public function index () {
        $user_id = session('id');

        $user = Patient::find($user_id);

        // get appointments
        $pending = Appointment::where('patient_id', session('id')) -> where('status', 'pending') -> get();
        $yellow = Self::assembleAppo($pending);

        $approve = Appointment::where('patient_id', session('id')) -> where('status', 'approve') -> get();
        $green = Self::assembleAppo($pending);

        $reject = Appointment::where('patient_id', session('id')) -> where('status', 'reject') -> get();
        $red = Self::assembleAppo($pending);

        $done = Appointment::where('patient_id', session('id')) -> where('status', 'done') -> get();
        $blue = Self::assembleAppo($pending);

        return view('profilePatient', ['user' => $user, 'pending' => $yellow, 'approve' => $green, 'reject' => $red, 'done' => $blue]);
    }
}
