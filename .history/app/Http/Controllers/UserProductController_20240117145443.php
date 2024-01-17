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
        $data = $request->except(['_token'],['image']);
        $data['id_user'] = $userId;
        // $file = $request->image;
        // if(!empty($file)){
        //     $data['image'] = $file->getClientOriginalName();
        // }
        // if(Product::create( $data )) {
        //     if(!empty($file)){
        //         $file->move('upload/product/image', $file->getClientOriginalName());
        //     }
        //     return redirect("/my-account/product")->with("success","Success");
        // }else {
        //     return back()->with("error","Error");
        // }
        Product::create( $data );
        return redirect("/my-account/product")->with("success","Success");
    }
    public function create_image(Request $request) {
        $data = [];
        if($request->hasfile('image'))
        {

            foreach($request->file('imgage') as $image)
            {

                $name = $image->getClientOriginalName();
                $name_2 = "hinh50_".$image->getClientOriginalName();
                $name_3 = "hinh200_".$image->getClientOriginalName();

                //$image->move('upload/product/', $name);

                $path = public_path('upload/product/' . $name);
                $path2 = public_path('upload/product/' . $name_2);
                $path3 = public_path('upload/product/' . $name_3);

                Image::make($image->getRealPath())->save($path);
                Image::make($image->getRealPath())->resize(50, 70)->save($path2);
                Image::make($image->getRealPath())->resize(200, 300)->save($path3);

                $data[] = $name;
            }
        }

        $product= new Products();
        $product->filename=json_encode($data);
        $product->save();

        return back()->with('success', 'Your images has been successfully');
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
        $data = Product::find($id);
        $cart = session()->get('cart', []);

        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
        if (isset($cart[$id])) {
            // Nếu đã tồn tại, tăng số lượng lên 1
            $cart[$id]['quantity']++;
        } else {
            // Nếu chưa tồn tại, thêm sản phẩm vào giỏ hàng với số lượng là 1
            $cart[$id] = [
                'product_id' => $id,
                'quantity' => 1,
                'price' => $data['price'],
                'image' => $data['image'],
                'name' => $data['name'],
            ];
        }

        // Lưu giỏ hàng vào session
        session()->put('cart', $cart);
    }


    public function CartPage() {
        return view('frontend.cart.cart');
    }
    public function addCart(Request $request) {
        $id = $request->get('id');
        $qty = $request->get('quantity');
        $data = Product::find($id);
        $cart = session()->get('cart', []);

        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
        if (isset($cart[$id])) {
            // Nếu đã tồn tại, tăng số lượng lên 1
            $cart[$id]['quantity']++;
        } else {
            // Nếu chưa tồn tại, thêm sản phẩm vào giỏ hàng với số lượng là 1
            $cart[$id] = [
                'product_id' => $id,
                'quantity' => 1,
                'price' => $data['price'],
                'image' => $data['image'],
                'name' => $data['name'],
            ];
        }
        session()->put('cart', $cart);
    }
    public function minusCart(Request $request) {
        $id = $request->get('id');
        $qty = $request->get('quantity');
        $data = Product::find($id);
        $cart = session()->get('cart', []);

        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
        if (isset($cart[$id])) {
            // Nếu đã tồn tại, tăng số lượng lên 1
            $cart[$id]['quantity']--;
            if($cart[$id]['quantity'] < 1) {
                unset($cart[$id]);

            // Cập nhật lại giỏ hàng trong session
            session()->put('cart', $cart);
            }
        } else {
            // Nếu chưa tồn tại, thêm sản phẩm vào giỏ hàng với số lượng là 1
            $cart[$id] = [
                'product_id' => $id,
                'quantity' => 1,
                'price' => $data['price'],
                'image' => $data['image'],
                'name' => $data['name'],
            ];
        }
        session()->put('cart', $cart);
    }
    public function deleteCart(Request $request) {
        $id = $request->get('id');
        $qty = $request->get('quantity');
        $data = Product::find($id);
        $cart = session()->get('cart', []);

        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
        if (isset($cart[$id])) {
            // Nếu đã tồn tại, tăng số lượng lên 1
                unset($cart[$id]);
            // Cập nhật lại giỏ hàng trong session
            session()->put('cart', $cart);
        }
    }
    public function CartCreate(Request $request) {

    }
}
