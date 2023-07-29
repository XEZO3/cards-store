<?php

namespace App\Http\Controllers;

use App\Models\agents;
use App\Models\banner;
use App\Models\card;
use App\Models\category;
use App\Models\siteInfo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Cookie;

class homeController extends Controller
{
    function index(){
        $category = category::all();
        $banner = banner::all();
        return view("public.home",['category'=>$category,'banner'=>$banner]);
    }
 
    function agents(){
        $data = agents::all();
        return view("public.agents",['agents'=>$data]);
    }
    function search(Request $req){
        $name = $req->query('name');
        $data = card::where('name','like','%'.$name.'%')->get();
        return view('public.cards',['products'=>$data]);
    }
    
    function terms(){
        $info = siteInfo::first();
        return view("public.terms",['terms'=>$info['terms']]);
    }
    function service(){
        $info = siteInfo::first();
        return view("public.service",['service'=>$info['service']]);
    }
}
