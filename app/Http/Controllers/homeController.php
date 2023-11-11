<?php

namespace App\Http\Controllers;

use App\Models\agents;
use App\Models\banner;
use App\Models\card;
use App\Models\category;
use App\Models\news;
use App\Models\siteInfo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Cookie;

class homeController extends Controller
{
    function index(Request $req){
         $name = $req->query('name');
         $categoryQuery = category::query();
         if (!empty($name)) {
            $categoryQuery->where('name', 'like', '%' . $name . '%');
         }
         $category = $categoryQuery->get();
         $banner = banner::all();
         return view("public.home",['category'=>$category,'banner'=>$banner]);
    }
 
    function agents(){
        $data = agents::all();
        return view("public.agents",['agents'=>$data]);
    }
    // function search(Request $req){
    //     $name = $req->query('name');
    //     $category = category::where('name','like','%'.$name.'%')->get();
    //     $banner = banner::all();
    //     return view("public.home",['category'=>$category,'banner'=>$banner]);
    // }
    
    function terms(){
        $info = siteInfo::first();
        return view("public.terms",['terms'=>$info['terms']]);
    }
    function service(){
        $info = siteInfo::first();
        return view("public.service",['service'=>$info['service']]);
    }

    function notification(){
        $news = news::all();
        return view("public.notification",['info'=>$news]);
    }
}
