<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drug;
use App\Models\Prescription;
use App\Models\Patient;

class ManagePrescription extends Controller
{

    private function get_drugs ($drug_list) {
        $meds = [];
        foreach ($drug_list as $drug) {
            $data = Drug::find($drug);
            $meds[] = $data;
        }
        return $meds;
    }

    public function index ($id) {
        $data = Prescription::find($id);
        $medicine = Self::get_drugs(json_decode($data->drugs, true));
        $user = Patient::find($data -> patient_id );
        return view('prescription', [
            'data' => $data,
            'med' => $medicine,
            'user' => $user
        ]);
    }
}
