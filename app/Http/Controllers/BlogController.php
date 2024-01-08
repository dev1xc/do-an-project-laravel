<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $data = Blog::paginate(5);
        return view('admin.blog.blog', compact('data'));
    }
    public function add() {
        return view('admin.blog.add');
    }
    public function create(Request $request) {
        $data = $request-> all();
        $file = $request->image;
        if(!empty($file)){
            $data['image'] = $file->getClientOriginalName();
        }
        if(Blog::create($data)){
            if(!empty($file)){
                $file->move('upload/blog', $file->getClientOriginalName());
            }
            return redirect("/blog")->with("success","");
        }else {
            return back()->with("error","");
        }
    }
    public function edit($id) {
        $data = Blog::find($id);
        return view("admin.blog.edit", compact("data"));
    }
    public function update(Request $request, $id) {
        $data = $request->all();
        $file = $request->image;
        if(!empty($file)){
            $data['image'] = $file->getClientOriginalName();
        }
        if(Blog::find($id)->update($data)){
            if(!empty($file)){
                $file->move('upload/blog', $file->getClientOriginalName());
            }
            return redirect("/blog")->with("success","");
        }
    }
    public function uploadImage(Request $request) {
        if($request->hasFile('upload')) {
                  $originName = $request->file('upload')->getClientOriginalName();
                  $fileName = pathinfo($originName, PATHINFO_FILENAME);
                  $extension = $request->file('upload')->getClientOriginalExtension();
                  $fileName = $fileName.'_'.time().'.'.$extension;

                  $request->file('upload')->move(public_path('images'), $fileName);

                  $CKEditorFuncNum = $request->input('CKEditorFuncNum');
                  $url = asset('images/'.$fileName);
                  $msg = 'Image uploaded successfully';
                  $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

                  @header('Content-type: text/html; charset=utf-8');
                  echo $response;
        }
     }

     public function store(Request $request)
     {
         $input = $request->all();
         Blog::create($input);
         return redirect('/')->with('flash_message', 'New Product Addedd!');
     }
     public function delete($id) {
        Blog::destroy($id);
        return redirect("/blog")->with("success","Success");
     }
}
