<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class HandlePatient extends Controller
{
    public function index () {
        $user_id = session('id');

        $user = Patient::find($user_id);

        return view('profilePatient', ['user' => $user]);
    }
}
