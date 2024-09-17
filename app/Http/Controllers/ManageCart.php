<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Drug;

class ManageCart extends Controller
{
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
    

    public function clear_cart($id) {
        // DELETE FROM cart WHERE patient_id = $id 
        Cart::where('patient_id', $id)->delete();
    
        // Redirect back to the cart or a different page
        return redirect()->route('cart', ['id' => $id]);
    }

    public function buy_from_cart () {}
    
}
