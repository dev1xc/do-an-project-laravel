<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class UserProductController extends Controller
{
    //
    public function index()
    {
        $userId = Auth::id();
        $products = Product::where('id_user', $userId)->paginate(5);
        // $products['image'] = json_decode($products['image'], true);

        return view("frontend.myaccount.product", compact("products"));
    }
    public function add()
    {
        $data_category = Category::all();
        $data_brand = Brand::all();
        return view("frontend.myaccount.add", compact("data_category", "data_brand"));
    }
    public function create(Request $request)
    {
        $userId = Auth::id();
        $data = $request->except(['_token'], ['image']);
        $data['id_user'] = $userId;
        $images = array();
        if ($files = $request->file('image')) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $name_2 = "hinh50_" . $file->getClientOriginalName();
                $name_3 = "hinh200_" . $file->getClientOriginalName();

                $path = public_path('upload/product/' . $userId . '/' . $name);
                $path2 = public_path('upload/product/' . $userId . '/' . $name_2);
                $path3 = public_path('upload/product/' . $userId . '/' . $name_3);
                // if (!file_exists($path)) {
                //     mkdir($path, 666, true);
                // }
                Image::make($file->getRealPath())->save($path);
                Image::make($file->getRealPath())->resize(50, 70)->save($path2);
                Image::make($file->getRealPath())->resize(200, 300)->save($path3);

                $images[] = $name;
            }
        }
        if(count($images)>3) {
            $err = 'Khong the them qua 3 hinh cho san pham';
            $errors = [
                'max' => $err,
            ];
            return redirect()->back()->withErrors($errors);
        }if(count($images)<1) {
            $err = 'Phai them it nhat 1 hinh cho san pham';
            $errors = [
                'max' => $err,
            ];
            return redirect()->back()->withErrors($errors);
        }else {

        $data['image'] = json_encode($images);

        Product::create($data);
        return redirect("/my-account/product")->with("success", "Success");
        }
    }
    public function edit($id)
    {
        $product = Product::find($id);
        $product['image'] = json_decode($product['image'], true);
        $data_category = Category::all();
        $data_brand = Brand::all();
        return view("frontend.myaccount.edit", compact("product", "data_category", "data_brand"));
    }
    public function update($id, Request $request)
    {
        $userId = Auth::id();
        $tempGet = Product::find($id);
        $tempGet['image'] = json_decode($tempGet['image'], true);
        $image = $tempGet['image'];
        $temp = $request->all();
        $data = [];
        $files = $request->delete;
        $errors = [];
        if(!empty($files)) {
            foreach ($files as $key => $value) {
                $str = 'http://127.0.0.1:8000/upload/product/'.$userId.'/hinh50_';
                $value = str_replace($str,'', $value);
                $files[$key] = $value;
            }
            $data = array_diff($image, $files);
            $data = array_values($data);
        }else {
            $data = array_values($image);
        }

        // $temp['image'] = json_encode($data);
        //***************** */
        $images = array();
        if ($files2 = $request->file('image')) {
            foreach ($files2 as $file) {
                $name = $file->getClientOriginalName();
                $name_2 = "hinh50_" . $file->getClientOriginalName();
                $name_3 = "hinh200_" . $file->getClientOriginalName();

                $path = public_path('upload/product/' . $userId . '/' . $name);
                $path2 = public_path('upload/product/' . $userId . '/' . $name_2);
                $path3 = public_path('upload/product/' . $userId . '/' . $name_3);

                Image::make($file->getRealPath())->save($path);
                Image::make($file->getRealPath())->resize(50, 70)->save($path2);
                Image::make($file->getRealPath())->resize(200, 300)->save($path3);

                $images[] = $name;
            }
        }
        $temp['image'] = array_merge(array_values($images), $data);
        if(count($temp['image'])>3) {
            $err = 'Khong the them qua 3 hinh cho san pham';
            $errors = [
                'max' => $err,
            ];
            return redirect()->back()->withErrors($errors);
        }if(count($temp['image'])<1) {
            $err = 'Phai them it nhat 1 hinh cho san pham';
            $errors = [
                'max' => $err,
            ];
            return redirect()->back()->withErrors($errors);
        }
        else {
        // $data['image'] = json_encode($images);
        //***************** */
        Product::find($id)->update($temp);
        return redirect("/my-account/product")->with("success", "");
        // return view('test', compact("files"));
        }
    }
    public function delete($id)
    {
        Product::find($id)->delete();
        return redirect("/my-account/product")->with("success", "");
    }

    public function detail($id)
    {
        $data = Product::find($id);
        $data['image'] = json_decode($data['image'], true);
        $brand = Brand::find($data->id_brand);
        return view("frontend.product.detail", compact("data", 'brand'));
    }
    public function getAllProduct()
    {
        $data = Product::paginate(9);
        $data_category = Category::all();
        $data_brand = Brand::all();
        return view('frontend.shop.shop', compact('data', 'data_category', 'data_brand'));
    }
    public function search(Request $request)
    {
        $value = $request->except('_token');
        if($value['price'] == '0') {
            $value['price'] = '0-0';
        }
        $price_temp = $value['price'];
        $price = explode('-', $price_temp);
        $data = Product::query();
        if($request->has('name')){
            $data->where('name', 'like', '%' . $value['name'] . '%');
        }
        if($request->has('category')){
            $data->where('id_category', '=', $value['category']);
        }
        $data = Product::where('name', 'like', '%' . $value['name'] . '%')->where('id_category', '=', $value['category'])->where('id_brand', '=', $value['brand'])->whereBetween('price', [$price[0], $price[1]])->paginate(9);

        return view('frontend.shop.search', compact('data'));
    }
    public function search_name(Request $request) {
        $value = $request->except('_token');
        $data = Product::where('name', 'like', '%' . $value['name'] . '%')->paginate(9);
        return view('frontend.shop.search', compact('data'));
    }
    public function slCart(Request $request)
    {
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


    public function CartPage()
    {
        return view('frontend.cart.cart');
    }
    public function addCart(Request $request)
    {
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
    public function minusCart(Request $request)
    {
        $id = $request->get('id');
        $qty = $request->get('quantity');
        $data = Product::find($id);
        $cart = session()->get('cart', []);

        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
        if (isset($cart[$id])) {
            // Nếu đã tồn tại, tăng số lượng lên 1
            $cart[$id]['quantity']--;
            if ($cart[$id]['quantity'] < 1) {
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
    public function deleteCart(Request $request)
    {
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
    public function CartCreate(Request $request)
    {
    }
}
