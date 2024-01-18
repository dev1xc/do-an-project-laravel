<?php

namespace App\Http\Controllers;

use App\Models\Country;
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
            // 'level' => 0
        ];
        $remember = false;
        if(Auth::attempt($login,$remember)){
            $userId = Auth::id();
            $remember = true;
            $user = User::find($userId);
            session()->put('nameSignIn', $user->name);
            session()->put('HasSignIn', $remember);
            session()->put('level',0);
            return redirect('/home-page')->with('success','');

        }
            return back()->with('error','');
    }
    public function logout() {
        Auth::logout();
        session()->forget('HasSignIn');
        session()->forget('nameSignIn');
        return redirect('/sign-in')->with('success','');
    }
    public function myaccount(){
        return view('frontend.myaccount.myaccount');
    }
    public function updateaccount() {
        $id = Auth::id();
        $data = User::find($id);
        $country = Country::all();
        return view('frontend.myaccount.update', compact('data','country'));
    }
    public function updateuser(Request $request) {
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
            return redirect("/my-account/update")->with("success","Success");
        }else {
            return back()->with("error","Error");
        }
    }
}
