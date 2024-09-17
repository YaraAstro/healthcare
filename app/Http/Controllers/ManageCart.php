<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class ManageCart extends Controller
{
    public function index ($id) {
        $data = Cart::where('patient_id', $id);
        return view('cart');
    }
}
