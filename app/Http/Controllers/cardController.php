<?php

namespace App\Http\Controllers;

use App\Models\card;
use App\Models\category;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class cardController extends Controller
{
    function index(Request $req,category $category){
        $protucts = card::where('category_id',$category['id'])->where('avilability',1)->get();
        return view("public.cards",['products'=>$protucts]);
    }


}
