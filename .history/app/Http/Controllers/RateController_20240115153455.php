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
        $id_blog = session('idBlog');
        $data['rate'] = $request->get('rate');
        $data['id_user'] = $id_user;
        $data['id_blog'] = session('idBlog');
        if(RateBlog::where('id_user', $id_user)->where('id_blog',$id_blog)->exists()) {
            RateBlog::where('id_user',$id_user)->where('id_blog',$id_blog)->update($data);
        }else {
            RateBlog::create($data);
        }

    }
}
