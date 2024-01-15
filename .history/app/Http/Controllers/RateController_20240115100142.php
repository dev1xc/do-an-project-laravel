<?php

namespace App\Http\Controllers;

use App\Models\RateBlog;
use Illuminate\Http\Request;

class RateController extends Controller
{
    //
    public function create(Request $request) {
        $id_user = Auth::user()->id;
        $data = $request->all();
        RateBlog::create($data);
    }
}
