<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\RateBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserBlogController extends Controller
{
    //
    public function index() {
        $data = Blog::paginate(3);
        return view('frontend.blog.list-blog', compact('data'));
    }
    public function detailblog(Request $request, $id) {
        $id_user = Auth::id();
        $data = Blog::Where('id', $request -> id)->first();
        session()->put('idBlog', $request->id);
        $getAvg = RateBlog::where('id_blog',$id)->avg('rate');
        return view('frontend.blog.blog-detail', compact('data','getAvg'));
    }
    public function comment($id, Request $request) {
        $id_user = Auth::id();
        $data = $request -> all();
        Comment::create()

    }
}
