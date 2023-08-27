<?php

namespace App\Http\Controllers;

use App\Models\balance;
use App\Models\office;
use App\Models\payment_methods;
use App\Models\zip_codes;
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
    public function office(){
        $office = office::all();
        return view("public.payment.office",['office'=>$office]);
    }
    public function transition(Request $req,payment_methods $payment){
        
        $data = $req->validate([
            'balance'=>"required|Integer|gt:25|lte:1000",
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
    public function recharge_the_balance(Request $req){
        $code = $req->validate([
            "code"=>"required"
        ]);
        $result =zip_codes::where("code",$code)->where("validity",1)->first();
        if($result!=null){
            $result->update(['validity'=>0]);
            $user = auth()->user();
            $user->balance = $user->balance+$result['amount'];
            $user->save();
            return redirect()->back()->with('message', 'success');

        }
        return redirect()->back()->with('error', 'failed');
    }
    public function recharge(){
        return view("public.payment.recharge");

    }

    public function paymenthistory(){
    $balance = balance::with("payment_methods")->where("user_id",auth()->id())->get();
    return view("public.payment.paymenthistory",['balance'=>$balance]);
    }
}
 