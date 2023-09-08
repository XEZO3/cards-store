<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\User;
use Illuminate\Http\Request;

class orderController extends Controller
{
    function index(Request $req){
        // if($req->input(""))
        $orders = order::with(['User','card'])->orderByDesc('id')->get();
         return view("admin.home.orders",['orders'=>$orders]);
     }
     function setstate(Request $req,order $order,$state){
        if($state=="rejected"){
            $data = $req->validate([
                'rejecte_cause'=>"required"
            ]);
            $data['state']="rejected";
            $order->update($data);
            $user = User::findOrFail($order['user_id']);
            $user->balance = $user->balance+$order['total'];
            $user->save();
            return redirect()->back()->with('message', 'تمت العملية بنجاح');
        }
        $order->update(['state'=>$state]);
        return redirect()->back()->with('message', 'تمت العملية بنجاح');
     }
}
