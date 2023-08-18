<?php

namespace App\Http\Controllers;

use App\Models\siteInfo;
use App\Models\User;
use Illuminate\Http\Request;

class authController extends Controller
{
    function register(){
        $info = siteInfo::all()->first();
        return view("public.create",['info'=>$info]);
    }
    function store(Request $request){
        // dd($request);
        $formInputs = $request->validate([
            'name'=>'required|min:3',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:3|confirmed',
            'phone_number'=>"required"
            
        ]);
        $formInputs['password']=bcrypt($formInputs['password']);
        $formInputs['permession'] = "User";
        
        $user = User::create($formInputs);
        $name = $user['name'];
        auth()->login($user);
        return redirect("/")->with('message','welcome '.$name);
        
    }
    function login(){
        return view("public.login");
    }
    function loginPost(Request $request){
        $formInputs = $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);
        
        if(auth()->attempt($formInputs)){
            $request->session()->regenerate();
            return redirect("/");
        }else{
            return back()->withErrors(["email"=>"email or password is incorrect"])->onlyInput("email");
        }
    }
    function logout(Request $request){
        auth()->logout();
        return redirect("/");
    }
}
