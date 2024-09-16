<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drug;

class ManageDrug extends Controller
{
    public function index () {
        $drug = Drug::all();
        return view('products', ['drug' => $drug]);
    }
}
