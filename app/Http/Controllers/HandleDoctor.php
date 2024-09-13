<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HandleDoctor extends Controller
{
    public function index () {
        return view('profileDoctor');
    }
}
