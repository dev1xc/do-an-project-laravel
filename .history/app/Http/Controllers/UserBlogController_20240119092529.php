<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\RateBlog;
use App\Models\User;
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
        $data_cmt = Comment::where('blog_father','=', 0)->where('id_blog','=',$id)->get();
        $data_cmt_son = Comment::where('blog_father','>', 0)->get();
        $data_people= User::whereIn('id',);
        return view('frontend.blog.blog-detail', compact('data','data_cmt','data_cmt_son','getAvg','data_people'));
    }
    public function comment($id, Request $request) {
        $id_user = Auth::id();
        $data = $request -> all();
        $data['id_user'] = $id_user;
        $data['id_blog'] = $id;
        if(isset($data['blog_father'])){
            $data['blog_father'] = $request->blog_father;
        }
        Comment::create($data);
        return redirect('/blog-detail/'.$id)->with('success','');
    }
    public function lastblog($id) {
        $previous = Blog::where('id', '<', $id)->max('id');
        return redirect('blog-detail/'.$previous)->with('success','success');

    }
    public function nextblog($id) {
        $next = Blog::where('id', '>', $id)->min('id');
        return redirect('blog-detail/'.$next)->with('success','success');
    }
}
