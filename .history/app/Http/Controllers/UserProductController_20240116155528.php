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
        $userId = Auth::id();
        $products = Product::where('id_user',$userId)->paginate(5);
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
    public function update($id, Request $request) {
        Product::find($id)->update( $request->all());
        return redirect("/my-account/product")->with("success","");
    }
    public function delete($id) {
        Product::find($id)->delete();
        return redirect("/my-account/product")->with("success","");
    }

    public function detail($id) {
        $data = Product::find($id);
        $brand = Brand::find($data->id_brand);
        return view("frontend.product.detail", compact("data",'brand'));
    }
    public function getAllProduct() {
        $data = Product::paginate(9);
        $data_category = Category::all();
        $data_brand = Brand::all();
        return view('frontend.shop.shop', compact('data','data_category','data_brand'));
    }
    public function search(Request $request) {
        $value = $request -> except('_token');
        $price_temp = $value['price'];
        $price = explode('-', $price_temp);
        $data = Product::where('name', 'like', '%'.$value['name'].'%')->where('id_category','=', $value['category'])->where('id_brand','=', $value['brand'])->whereBetween('price',[$price[0],$price[1]])->paginate(9);
        return view('frontend.shop.search', compact('data'));
    }
    public function slCart(Request $request) {
        $data = $request -> all();
        $data['id'] = $request -> get('id');
        $data['qty'] = $request -> get('qty');
        session() -> put('id_product', $data['id']);
        session() -> put('qty_product', $data['qty']);
        return view('frontend.cart.cart', compact('data'));
    }
}
