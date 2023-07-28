<?php

namespace App\Http\Controllers;

use App\Models\card;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;

class cartController extends Controller
{
    //
    function index(Request $req){
        $wishListCookie = $req->cookie('cart');
        try{
        $decryptedCookieValue = decrypt($wishListCookie);
        $wishListData = json_decode($decryptedCookieValue, true);
        }catch(DecryptException $e){
            return view("public.cart",['cards'=>[],'quen'=>[]]); 
        }
        
        $idList = array_column($wishListData, 'Id');
        $quenList = array_map('intval', array_column($wishListData, 'quen'));
        $cards = card::whereIn('id',$idList)->with(['category'])->get();
        return view("public.cart",['cards'=>$cards,'quen'=>$quenList]);
    }
}
