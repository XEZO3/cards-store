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
    function storeUser(Request $request){
        // dd($request);
        $formInputs = $request->validate([
            'name'=>'required|min:3',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:3|confirmed',
            'phone_number'=>"required",
            'balance'=>"required|numeric",
            'country'=>"required",
            'town'=>"required",
            'location'=>"required"
            
        ]);
        $formInputs['password']=bcrypt($formInputs['password']);
        $formInputs['permession'] = "User";
        User::create($formInputs);
        return redirect()->back()->with('message', 'تم تسجيل المستخدم  ');
        
    }



    public function editUser(Request $request, $id)
{
    // Find the user by ID
    $user = User::find($id);

    // Validate the request data
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:users,email,'.$id,
        'balance' => 'numeric',
        'password' => 'nullable|min:6',
        'country'=>"required",
        'town'=>"required",
        'location'=>"required",
        'rank'=>"required",
        'phone_number'=>"required"
    ]);

    // Update user information
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->balance = $request->input('balance');
    $user->phone_number = $request->input('phone_number');
    $user->town = $request->input('town');
    $user->location = $request->input('location');
    $user->rank = $request->input('rank');
    $user->country = $request->input('country');

    if ($request->input('password')) {
        $user->password = bcrypt($request->input('password'));
    }
    $user->save();

    return redirect()->back()->with('message', 'تم تحديث المعلومات بنجاح');
}



    function index(){
        $data= User::where('permession','Admin')->get();
        return view("admin.admins",['users'=>$data]);
    }
    function users(){
        $data= User::where('permession','user')->get();
        return view("admin.users",['users'=>$data]);
    }
    public function delete(Request $req,$id){
        User::destroy($id);
        return back()->with('success',"تم الحذف بنجاح");
    }
    function store(Request $request){
        // dd($request);
        $formInputs = $request->validate([
            'name'=>'required|min:3',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:3|confirmed',
            'country'=>"required",
            'town'=>"required",
            'location'=>"required",
            'balance' => 'numeric',

        ]);
        $formInputs['phone_number'] = "1234556";
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
        $data['password']= bcrypt($data['password']);
        $user->update($data);
        return redirect("/admin");
    }
    function password(Request $req){
        return view("admin.change");
    }
    function login(){
        return view("admin.login");
    }
    function logout(Request $request){
        auth()->logout();
        return redirect("/admin/login");
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
