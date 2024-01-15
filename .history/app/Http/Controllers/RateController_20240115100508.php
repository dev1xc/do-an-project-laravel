<?php

namespace App\Http\Controllers;

use App\Models\RateBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RateController extends Controller
{
    //
    public function create(Request $request, $id) {
        $id_user = Auth::id();
        $data = $request->all();
        $data['id_user'] = $id_user;

        RateBlog::create($data);
    }
}
