<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class UserBlogController extends Controller
{
    //
    public function index() {
        $data = Blog::paginate(3);
        return view('frontend.blog.list-blog', compact('data'));
    }
    public function detailblog(Request $request) {
        $data = Blog::Where('id', $request -> id)->first();
        session()->put('idBlog', $request->id);
        $getAvg = RateBlog::where('id_user', $id_user)->where('id_blog',$id_blog)->exists();
        return view('frontend.blog.blog-detail', compact('data'));
    }
}
