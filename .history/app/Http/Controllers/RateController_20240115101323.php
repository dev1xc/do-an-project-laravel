<?php

namespace App\Http\Controllers;

use App\Models\RateBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RateController extends Controller
{
    //
    public function create(Request $request) {
        $id_user = Auth::id();
        $data['rate'] = $request->data;
        $data['id_user'] = $id_user;
        $data['id_blog'] = 4;
        RateBlog::create($data);
    }
}
