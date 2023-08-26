<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\payment_methods;
use Illuminate\Http\Request;

class paymentController extends Controller
{
    public function index(Request $req){
        $payment = payment_methods::with(['category'])->get();
        return view("admin.payment.show",['payment'=>$payment]);
    }
    public function delete(Request $req,$id){
        payment_methods::destroy($id);
        return back()->with('success',"تم الحذف بنجاح");
    }
    public function edit(Request $req,payment_methods $payment){
        $payment = payment_methods::all();
        return view('admin.payment.edit',['payment'=>$payment]);
    }

    public function add(Request $req){
        
        return view('admin.payment.add');
    }
}
