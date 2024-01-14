<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
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
        $data_category = Category::all();
        $data_brand = Brand::all();
        return view("frontend.myaccount.add",compact("data_category","data_brand"));
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
        $product = Product::find($id);
        $data_category = Category::all();
        $data_brand = Brand::all();
        return view("frontend.myaccount.edit", compact("product","data_category","data_brand"));
    }
    public function update($id) {
$data_category = Category::find($id);
    }
}
