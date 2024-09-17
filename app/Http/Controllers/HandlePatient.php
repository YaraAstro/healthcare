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
            $list[] = $data;
        }
        return $list;
    }
    
    
    public function index() {
        $user_id = session('id');

        $user = Patient::find($user_id);

        // Get appointments by status
        $pending = Appointment::where('patient_id', $user_id)
                              ->where('status', 'pending')
                              ->get();
        $yellow = $this->assembleAppo($pending);

        $approve = Appointment::where('patient_id', $user_id)
                              ->where('status', 'approve')
                              ->get();
        $green = $this->assembleAppo($approve);

        $reject = Appointment::where('patient_id', $user_id)
                             ->where('status', 'reject')
                             ->get();
        $red = $this->assembleAppo($reject);

        $done = Appointment::where('patient_id', $user_id)
                           ->where('status', 'done')
                           ->get();
        $blue = $this->assembleAppo($done);

        return view('profilePatient', [
            'user' => $user,
            'pending' => $yellow,
            'approve' => $green,
            'reject' => $red,
            'done' => $blue
        ]);
    }
}
