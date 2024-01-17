<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function CartCreate(Request $request) {
        $id = Auth::id();
        $data = session()->get('cart');
        $data_save = ''$data;
        $total = 0;
        foreach ($data as $item) {
            $total += $item['quantity'] * $item['price'];
        }
        Cart::create([
            'id_user' => $id,
            'price'=> $total,
            'saveData' => $data_save,
        ]);
        return redirect()->route('/home-page')->with('success','Success');
    }
}
