<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utils\GenerateID;

class ManageAppointment extends Controller
{
    public function index () {
        return view('appointment');
    }

    public function patient_appo (Request $request) {}

    public function doctor_appo (Request $request) {}

    public function patient_symptoms (Request $request) {
        $new_id = GenerateID::generateId('AP');
    }

    public function doctor_examine (Request $request) {
        $new_id = GenerateID::generateId('PR');
    }

}
