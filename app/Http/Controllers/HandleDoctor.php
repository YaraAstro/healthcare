<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class HandleDoctor extends Controller
{
    public function index () {
        $user_id = session('id');

        $user = Doctor::find($user_id);

        return view('profileDoctor', ['user' => $user]);
    }
}
