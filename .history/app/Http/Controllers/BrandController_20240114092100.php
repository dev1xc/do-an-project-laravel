<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $data = Category::paginate(5);
        return view('admin.category.category', compact('data'));
    }
    public function add() {
        return view('admin.category.add');
    }
    public function create(Request $request) {
        Category::create($request->all());
        return redirect('/category');
    }
    public function edit($id, Request $request) {
        $data = Category::find($id);
        return view('admin.category.edit', compact('data'));
    }
    public function update(Request $request, $id) {
        Category::find( $id )->update($request->all());
        return redirect('/category');
    }
    public function delete($id) {
        Category::find( $id )->delete();
        return redirect('/category');
    }

}
