<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request) {
        $id = $request -> id;
        $data = DB::table("users")->where('id', $id)->get();
        return view('admin.user.user', compact('data'));
    }
}
