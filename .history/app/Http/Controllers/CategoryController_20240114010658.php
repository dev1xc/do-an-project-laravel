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
        $categories = Category::paginate(5);
        return view('', compact('categories'));
    }

}
