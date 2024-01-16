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
        $id = $request->get('id');
        $qty = $request->get('qty');

   // what is Session:
   //Sessions are used to store information about the user across the requests.
   // Laravel provides various drivers like file, cookie, apc, array, Memcached, Redis, and database to handle session data.
   // so cause write the below code in controller and tis code is fix
        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                    $id => [
                        "id" => $id,
                        "quantity" => $qty,
                    ]
            ];
            session()->put('cart', $cart);

        }

        // if cart not empty then check if this product exist then increment quantity
        if(session('cart')->has($id)) {
            $cart[$id]['quantity'] + 1;
            session()->put('cart', $cart); // this code put product of choose in cart
        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            'id'=> $id,
            "quantity" => 1,
        ];

        session()->put('cart', $cart); // this code put product of choose in cart

    }

    public function CartPage() {
        return view('frontend.cart.cart');
    }
}
