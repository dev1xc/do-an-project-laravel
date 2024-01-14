<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $data = Brand::paginate(5);
        return view('admin.brand.brand', compact('data'));
    }
    public function add() {
        return view('admin.brand.add');
    }
    public function create(Request $request) {
        Brand::create($request->all());
        return redirect('/brand');
    }
    public function edit($id, Request $request) {
        $data = Brand::find($id);
        return view('admin.brand.edit', compact('data'));
    }
    public function update(Request $request, $id) {
        Brand::find( $id )->update($request->all());
        return redirect('/category');
    }
    public function delete($id) {
        Brand::find( $id )->delete();
        return redirect('/category');
    }

}
