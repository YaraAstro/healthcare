<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Drug;
use App\Models\Patient;

class ManageCart extends Controller
{

    private function clear_cart($id) {
        // DELETE FROM cart WHERE patient_id = $id 
        Cart::where('patient_id', $id)->delete();
    }

    private function format_data($total) {
        $data = new \stdClass();
        $data->id = 'PRAPC';
        $data->amount = $total;
        $data->appo_id = 'APXXX';
        
        return $data;
    }

    private function cart_table_data($user_id) {
        $data = Cart::with('drug')->where('patient_id', $user_id)->get();
        $items = [];
        
        foreach ($data as $cart) {
            $item = [
                'id' => $cart->drug_id,
                'name' => $cart->drug->name,
                'qty' => $cart->qty,
                'price' => $cart->drug->amount,
                'total' => $cart->total,
            ];
            $items[] = $item;
        }
    
        return $items;
    }

    private function cart_meds($list) {
        // Optimized to fetch all drugs in a single query
        return Drug::whereIn('id', $list)->get();
    }
    
    public function index ($id) {
        if (!is_null($id)) {

            $data = Self::cart_table_data($id);
            return view('cart', ['data' => $data]);

        } else {
            return redirect() -> route('login');
        }
    }

    public function add_item_to_cart(Request $request) {
        $request->validate([
            'drug_id' => 'required|exists:drug,id', 
            'drug_qty' => 'required|integer|min:1'
        ]);
    
        $item = Drug::find($request->input('drug_id'));
    
        // Check if the item already exists in the cart
        $existingCartItem = Cart::where('patient_id', session('id'))
                                ->where('drug_id', $request->input('drug_id'))
                                ->first();
    
        if ($existingCartItem) {
            // Update quantity and total if the item already exists
            $existingCartItem->qty += $request->input('drug_qty');
            $existingCartItem->total = $existingCartItem->qty * $item->amount;
            $existingCartItem->save();
        } else {
            // Create a new cart item if it does not exist
            $data = [
                'patient_id' => session('id'),
                'drug_id' => $request->input('drug_id'),
                'qty' => $request->input('drug_qty'),
                'price' => (float) $item->amount,
                'total' => (float) ($item->amount * $request->input('drug_qty')),
            ];
    
            $createdCartItem = Cart::create($data);
    
            if ($createdCartItem) {
                // Redirect with success message
                return redirect()->route('cart', ['id' => session('id')])
                                 ->with('success', 'Item added to cart successfully!');
            } else {
                // Redirect with error message
                return redirect()->route('cart', ['id' => session('id')])
                                 ->with('error', 'Failed to add item to cart.');
            }
        }
    
        // Redirect with success message if updated
        return redirect()->route('cart', ['id' => session('id')])
                         ->with('success', 'Cart updated successfully!');
    }
    
    public function remove_item_from_cart($drug_id) {
        // DELETE FROM cart WHERE patient_id = session('id') AND drug_id = $id
        Cart::where('patient_id', session('id'))
            ->where('drug_id', $drug_id)
            ->delete();
    
        // Redirect back to the cart
        return redirect()->route('cart', ['id' => session('id')]);
    }
    
    public function buy_from_cart (Request $request,$id) {
        $request -> validate([
            'total' => 'required|string',
        ]);
        $user = Patient::find($id);
        $data = Self::format_data($request -> input('total'));

        session(['cart' => $data]);

        Self::clear_cart($id);
        
        return redirect()->route('payment', ['id' => $id]);

    }

}
