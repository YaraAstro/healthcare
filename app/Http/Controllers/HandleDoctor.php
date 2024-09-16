<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\Patient;

class HandleDoctor extends Controller
{

    private function assembleAppo($appo_query) {
        $list = [];
        foreach ($appo_query as $this_appo) {
            $patient = Patient::find($this_appo->patient_id)->name;
            $data = [
                'id' => $this_appo->id,
                'patient' => $patient,
                'date' => $this_appo->date,
                'status' => $this_appo->status,  
            ];
            $list[] = $data; // Using array syntax to add elements
        }
        return $list;
    }

    public function index () {
        $user_id = session('id');

        $user = Doctor::find($user_id);

        // get appointments
        $appo = Appointment::where('doctor_id', session('id')) -> get();
        $soon = Self::assembleAppo($appo);

        return view('profileDoctor', ['user' => $user, 'appo' => $soon]);
    }
}
