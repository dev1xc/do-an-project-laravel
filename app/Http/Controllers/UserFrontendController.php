<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserFrontendController extends Controller
{
    //
    public function index() {
        return view('frontend.signin_signup.signup');
    }
    public function index2() {
        return view('frontend.signin_signup.signin');
    }
    public function signup(Request $request) {
        $data = $request->all();
        $data['level'] = 0;
        $data['password'] = Hash::make($data['password']);
        if(User::create($data)){
            return redirect("/sign-in")->with("success","");
        }else {
            return back()->with("error","");
        }
    }
    public function signin(Request $request) {
        $login = [
            'email' => $request -> email,
            'password' => $request -> password,
            'level' => 0
        ];
        $remember = true;
        if(Auth::attempt($login,$remember)){
            return redirect('/home-page')->with('success','');
        }
            return back()->with('error','');
    }
}
