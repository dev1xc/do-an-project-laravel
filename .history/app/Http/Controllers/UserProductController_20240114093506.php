<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProductController extends Controller
{
    //
    public function index() {
        $products = Product::paginate(5);
        return view("frontend.myaccount.product", compact("products"));
    }
    public function add() {
        $data_product = Product::all()
        return view("frontend.myaccount.add");
    }
    public function create(Request $request) {
        $userId = Auth::id();
        $data = $request->except(['_token']);
        $data['id_user'] = $userId;
        $file = $request->image;
        if(!empty($file)){
            $data['image'] = $file->getClientOriginalName();
        }
        if(Product::create( $data )) {
            if(!empty($file)){
                $file->move('upload/product/image', $file->getClientOriginalName());
            }
            return redirect("/my-account/product")->with("success","Success");
        }else {
            return back()->with("error","Error");
        }
    }
    public function edit($id) {
        $products = Product::find($id);
        return view("frontend.myaccount.edit", compact("products"));
    }
}
