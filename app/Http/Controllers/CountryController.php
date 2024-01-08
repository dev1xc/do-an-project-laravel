<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $data = Country::paginate(5);
        return view('admin.country.country', compact('data'));
    }
    public function add() {
        return view('admin.country.add');
    }
    public function create(Request $request) {
        $data = $request-> all();
        if(Country::create($data)){
            return redirect("/country")->with("success","");
        }else {
            return back()->with("error","");
        }
    }
    public function edit($id) {
        $data = Country::find($id);
        return view("admin.country.edit", compact("data"));
    }
    public function update(Request $request, $id) {
        $data = $request->all();
        if(Country::find($id)->update($data)){
            return redirect("/country")->with("success","");
        }
    }
    public function delete($id) {
        Country::destroy($id);
        return redirect("/country")->with("success","Success");
}
}
