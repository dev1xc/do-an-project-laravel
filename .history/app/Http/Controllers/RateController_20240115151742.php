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
        $data['rate'] = $request->get('rate');
        $data['id_user'] = $id_user;
        $data['id_blog'] = session('idBlog');
        if(RateBlog::where('id_user', $id_user)->first()) {
        if(isset($id_user)){
            RateBlog::create($data);
        }else {
            return redirect('/sign-in')->with('error','');
        }
    }
}
