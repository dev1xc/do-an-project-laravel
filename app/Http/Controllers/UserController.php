<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $id = Auth::id();
        $data = User::find($id);
        $country = Country::all();
        return view('admin.user.user', compact('data','country'));
    }
    public function update(UpdateProfileRequest $request) {
        $userId = Auth::id();
        $data = $request->except(['_token']);
        $data['password'] = Hash::make($data['password']);
        $file = $request->avatar;
        if(!empty($file)){
            $data['avatar'] = $file->getClientOriginalName();
        }
        if(User::where('id', $userId)->update($data)){
            if(!empty($file)){
                $file->move('upload/user/avatar', $file->getClientOriginalName());
            }
            return redirect("/profile")->with("success","Success");
        }else {
            return back()->with("error","Error");
        }
    }
    }



