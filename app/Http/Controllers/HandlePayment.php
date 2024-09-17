<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Prescription;
use App\Utils\GenerateID;
use App\Models\Payment;

class HandlePayment extends Controller
{

    public function index ($id) {
        
        $presc = Prescription::where('id', $id)->first();

        if (is_null($presc)) {
            $user = Patient::find($id);
            $presc = session('cart');   
        } else {
            $user = Patient::find($presc -> patient_id );
        }

        return view('payment', ['user' => $user, 'data' => $presc]);
    }

    public function make_payment(Request $request, $id) {

        // Validate form inputs
        $request->validate([
            'card_name' => 'required|string|max:255',
            'card_number' => 'required|string|regex:/^\d{4}-\d{4}-\d{4}-\d{4}$/', // Regex for format 1111-2222-3333-4444
            'appo_id' => 'string',
            'patient_id' => 'required|string',
            'amount' => 'required|numeric', // Ensure it's a numeric value
        ]);
    
        // Generate new payment ID
        $new_id = GenerateID::generateId('PY');
    
        // Prepare data for Payment model
        $data = [
            'id' => $new_id,
            'patient_id' => $request->input('patient_id'), // Fixed: Use patient_id from request
            'appo_id' => $request->input('appo_id'),
            'name_on_card' => $request->input('card_name'),
            'cc_number' => $request->input('card_number'),
            'amount' => $request->input('amount'),
            'status' => 'pending',
        ];
    
        // Create new payment record
        Payment::create($data);

        if (!is_null($request->input('appo_id'))){
            // Update Prescription status
            Prescription::where('appo_id', $id)->update(['status' => 'paid', 'payment_id' => $new_id]);
        }
    
        // Optionally, return a response or redirect
        return redirect()->route('profile.patient', ['username' => session('username')]);
    }
    
}
