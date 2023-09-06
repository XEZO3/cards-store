<?php

namespace App\Http\Controllers;

use App\Models\card;
use App\Models\card_keys;
use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class orderController extends Controller
{
    public function index(Request $req){
        $orders = order::with(["card"])->where('user_id',auth()->id())->get();
        return view("public.orders",['orders'=>$orders]);
    }
    public function purchasing(Request $req,card $card){
        $data = $req->validate([
            'quentity'=>'required|Integer|gt:0',
            'game_id'=>($card['require_id']==1)?"required":""
        ]);
        $keys = card_keys::where("avilability",'1')->where("card_id",$card['id'])->take($data['quentity'])->get(); 
        
        if(count($keys) >= $data['quentity'] &&count($keys) >0){
            
            
            //$keytext = implode('\n',$keys->pluck('key')->toArray());
           $keysdata = "";
            $data['state'] = "done";
            foreach($keys as $item){
                $keysdata .= "<p>".$item['key']."</p>\n";
                $item->update(['avilability'=>0]);
                
            }
        $data['keys'] = $keysdata;
        }else {
        $data['state'] = "pending";
        }
        // if(count($keys)==0){
        //     $data['state'] = "pending";
        // }

        $total = ($card['price']*(100-$card['discount'])/100)*$data['quentity'];
        $data['user_id'] =auth()->id() ;
        $data['card_id'] = $card['id'];
        $data['total'] = $total;
        $user = auth()->user();
        if($user->balance<$total){
            return redirect()->back()->with('error', 'رصيدك لا يكفي');
        }

        DB::beginTransaction();
        try {
            order::create($data);
            // Update user balance
            $user->balance -= $total;
            $user->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            // Handle database transaction errors
            return redirect()->back()->with('error', 'حدث خطا الرجاء المحاولة لاحقا');
        }

        return redirect("/orders");
    }
    public function cancelOrder(order $order){
        if($order['user_id']==auth()->id() && $order['state'] =="pending"){
            DB::beginTransaction();
        try {
            $order->update(['state' => 'rejected']);
            $user = auth()->user();        
            $user->balance += $order['total'];
            $user->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            // Handle database transaction errors
            return redirect()->back()->with('error', 'حدث خطا الرجاء المحاولة لاحقا');
        }
            
            return redirect()->back()->with('success', 'تمت العملية بنجاح');
        } 
        return redirect()->back()->with('error', 'لا يمكنك الغاء هذا الطلب');
    }
}
