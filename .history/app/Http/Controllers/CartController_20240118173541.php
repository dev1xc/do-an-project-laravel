<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\HelloMail;
use App\Models\User;

class CartController extends Controller
{
    //
    public function CartCreate(Request $request) {
        $id = Auth::id();
        $data = session()->get('cart');
        $data_save = json_encode($data);
        $total = 0;
        foreach ($data as $item) {
            $total += $item['quantity'] * $item['price'];
        }
        $getEmail = User::find($id)->email;
        Mail::to($getEmail)->send(new HelloMail());
        Cart::create([
            'id_user' => $id,
            'price'=> $total,
            'saveData' => $data_save,
        ]);
        session()->forget('cart');
        return redirect('/home-page')->with('success','Success');


    }

    public function CartAdmin() {
        $data = Cart::paginate(5);
        return view('admin.cart.cart', compact('data'));
    }
    public function CartDetailAdmin($id) {
        $data = Cart::find($id);
        $data['saveData'] = json_decode($data['saveData'], true);
        session()->put('hehe', $data['saveData']);
        return view('admin.cart.detail', compact('data'));
    }
}
