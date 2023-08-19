<?php

namespace App\Http\Controllers;

use App\Models\order;
use Illuminate\Http\Request;

class orderController extends Controller
{
    public function index(){
        $orders = order::with(["card"])->where('user_id',auth()->id())->get();
        return view("public.orders",['orders'=>$orders]);
    }
}
