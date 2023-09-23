<?php

namespace App\Http\Controllers;

use App\Models\siteInfo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    function register(){
        $info = siteInfo::all()->first();
        return view("public.create",['info'=>$info]);
    }

    function profile(){
        $user = auth()->user();
        return view("public.profile",['user'=> $user]);
    }

    function profileEdit(Request $request){
        // Validate the form data
        $validator = $request->validate([
            'phone_number' => 'required|string|max:20',
            'name' => 'required|string|max:20',
            'country' => 'required|string|max:10',
            'town' => 'required|string|max:10',
            'location' => 'required|string|max:20',
            
        ]);

        // Retrieve the currently authenticated user
        $user = auth()->user();

        // Update profile fields
        $user->name = $request->input('name');
        $user->phone_number = $request->input('phone_number');
        $user->country = $request->input('country');
        $user->town = $request->input('town');
        $user->location = $request->input('location');


        // Check if the user wants to change the password
        if ($request->filled('current-password')) {
            $request->validate([
                'password' => 'required|string|confirmed|min:8',     
            ]);
            // Verify the current password
            if (!Hash::check($request->input('current-password'), $user->password)) {
                return redirect("/user/profile")
                    ->with('error', 'كلمة المرور التي قمت بادخالها خاطئة')
                    ->withInput();
            }

            // Update the password
            $user->password = Hash::make($request->input('password'));
        }

        // Save the user
        DB::beginTransaction();
        try {
            $user->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect("/user/profile")
                ->with('error', 'حدث خطا حاول مرة اخرى لاحقا')
                ->withInput();
        }

        return redirect("/user/profile")
            ->with('message', 'تم التحديث بنجاح');
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
        if(auth()->check()){
            return redirect("/");
        }
        $info = siteInfo::all()->first();
        return view("public.login",['info'=>$info]);
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
