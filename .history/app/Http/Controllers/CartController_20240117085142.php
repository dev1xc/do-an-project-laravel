<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function CartCreate(Request $request) {
        $id = Auth::id();
        $data = session()->get('cart');
        $total = 0;
        foreach ($data as $item) {
            $total += $item['quantity'] * $item['price'];
        }
        Cart::create([
            'id' => $id,
            'price'=> $total,
            'saveData' => $data,

        ])
    }
}
