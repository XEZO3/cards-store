<?php

namespace App\Http\Controllers;

use App\Models\card;
use App\Models\card_keys;
use App\Models\order;
use Illuminate\Http\Request;

class orderController extends Controller
{
    public function index(Request $req){
        $orders = order::with(["card"])->where('user_id',auth()->id())->get();
        return view("public.orders",['orders'=>$orders]);
    }
    public function purchasing(Request $req,card $card){
        // if($card['require_id']==0){
        // $data = $req->validate([
        //     'quentity'=>'required|Integer|gt:0'
        // ]);
        // }
        // else{
        //     $data = $req->validate([
        //         'quentity'=>'required|Integer|gt:0',
        //         'game_id'=>'required'
        //     ]);
        //     $keystext = "";
        //     $keys = card_keys::where("avilability",'1')->where("card_id",$card['id'])->take($data['quentity'])->get();
        //     if(count($keys)==$data['quentity']){
        //         foreach($keys as $item){
        //             $keystext = $keystext ."/n".$item['key'];
        //             $item::update(["avilability"=>0]);
        //         } 
        //     }else{
        //         $data['quentity']=count($keys);
        //         foreach($keys as $item){
        //             $keystext = $keystext ."/n".$item['key'];
        //             $item::update(["avilability"=>0]);
        //         } 
        //     }
             
        // }
        $data = $req->validate([
            'quentity'=>'required|Integer|gt:0',
            'game_id'=>($card['require_id']==1)?"required":""
        ]);
        $keys = card_keys::where("avilability",'1')->where("card_id",$card['id'])->take($data['quentity'])->get(); 
        
        if(count($keys) >= $data['quentity'] &&count($keys) >0){
            
            $data['quentity'] == count($keys);
            //$keytext = implode('\n',$keys->pluck('key')->toArray());
           $keysdata = "";
            $data['state'] = "done";
            foreach($keys as $item){
                $keysdata .= "<p>".$item['key']."</p>\n";
                $item->update(['avilability'=>0]);
                
            }
        $data['keys'] = $keysdata;
        }else if(count($keys)==0){
            $data['state'] = "pending";
        }

        $total = ($card['price']*(100-$card['discount'])/100)*$data['quentity'];
        $data['user_id'] =auth()->id() ;
        $data['card_id'] = $card['id'];
        $data['total'] = $total;
         
        order::create($data);
        $user = auth()->user();
        $user->balance = $user->balance-$total;
        $user->save();
        return redirect("/orders");
    }
}
