<?php

namespace App\Http\Controllers;

use App\Models\RateBlog;
use Illuminate\Http\Request;

class RateController extends Controller
{
    //
    public function create(Request $request) {
        $data = $request->all();
        RateBlog::create($data);
    }
}
