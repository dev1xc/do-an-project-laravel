<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $data = Category::paginate(5);
        return view('admin.category.category', compact('data'));
    }
    public function add() {

    }
    public function create(Request $request) {
        Category::create($request->all());
    }

}