<?php

namespace App\Http\Controllers;

use App\Models\balance;
use App\Models\payment_methods;
use Illuminate\Http\Request;

class balanceController extends Controller
{
    public function paymentMethod(){
        $methods = payment_methods::all();
        return view("public.payment.payment",['methods'=>$methods]);
    }
    public function checkout($id){
        $methods = payment_methods::find($id);
        return view("public.payment.checkout",['method'=>$methods]);
    }
    public function transition(Request $req,payment_methods $payment){
        
        $data = $req->validate([
            'balance'=>"required|Integer|gt:25",
            'name'=>"required",
            'note'=>"required"
        ]);
        
        $data['user_id']=auth()->user()->id;
        $data['price']=$data['balance']+$payment['ex_price'];
        $data['payment_methods_id'] =$payment['id'];
        $data['state'] ="pending";
        $balance = balance::create($data);
        return redirect("/viewpayment/".$balance['id']); 
        
    }
    public function viewpayment(balance $balance){
        $data = balance::with("payment_methods")->find($balance['id']);
        return view("public.payment.viewpayment",['balance'=>$data]);
    }
    public function paymenthistory(){
    $balance = balance::with("payment_methods")->where("user_id",auth()->id())->get();
    return view("public.payment.paymenthistory",['balance'=>$balance]);
    }
}
 