<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class authController extends Controller
{
    function register(){
        return view("admin.register");
    }
    function store(Request $request){
        // dd($request);
        $formInputs = $request->validate([
            'name'=>'required|min:3',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:3|confirmed',
            
        ]);
        $formInputs['password']=bcrypt($formInputs['password']);
        $formInputs['permession'] = "Admin";
        $user = User::create($formInputs);
        $name = $user['name'];
        return redirect("/admin")->with('message','welcome '.$name);
    }

    function change_password(Request $req){
        $user = User::findOrFail(auth()->user()->id);
        $data =$req->validate([
            'password'=>"required"
        ]);
        $user->update($data);
        return redirect("/admin");
    }
    function login(){
        return view("admin.login");
    }
    function loginPost(Request $request){
        $formInputs = $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);
        
        if(auth()->attempt($formInputs)){
            $request->session()->regenerate();
            return redirect("/admin");
        }else{
            return back()->withErrors(["email"=>"email or password is incorrect"])->onlyInput("email");
        }
    }
}
