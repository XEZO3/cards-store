<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\card;
use App\Models\card_keys;
use App\Models\order;
use Illuminate\Http\Request;

class keyController extends Controller
{
    function index(){
        $cards = card::all();
        $keys = card_keys::with("card")->get();
        return view("admin.card.key",['cards'=>$cards,'keys'=>$keys]);
    }
    function store(Request $req){
        $data = $req->validate([
            'card_id'=>"required|Integer",
            'key'=>"required"
        ]);
        $cardKeysArray = explode("\n", $data['key']);
        foreach($cardKeysArray as $key){
            card_keys::create([
                'card_id'=>$data['card_id'],
                'key'=>$key,
                'avilability'=>1
            ]);
        }
        return redirect()->back()->with('message', 'تمت العملية بنجاح');
    }
    function delete($id){
        $deletedRows = card_keys::destroy($id);
        if ($deletedRows > 0) {
            return redirect()->back()->with('message', 'تمت العملية بنجاح');
        }else{
            return redirect()->back()->with('error', 'حدث خطا');

        }
    }
    function addKeyToUser(Request $req,order $order){
        $data = $req->validate([
            'keys'=>"required"
        ]);
        $order->update($data);
        return redirect()->back()->with('message', 'تمت العملية بنجاح');

    }
}