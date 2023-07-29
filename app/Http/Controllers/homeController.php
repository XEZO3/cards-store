<?php

namespace App\Http\Controllers;

use App\Models\agents;
use App\Models\banner;
use App\Models\card;
use App\Models\category;
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
    function fav(Request $req){
        $wishListCookie = $req->cookie('wish');

        
            // Decrypt the cookie data and decode the JSON
          
                $decryptedCookieValue = decrypt($wishListCookie);
                $wishListData = json_decode($decryptedCookieValue, true);
                $idList = array_map('intval', array_column($wishListData, 'Id'));
                $data = card::whereIn('id',$idList)->get();
               
            // Your existing code to fetch the items from the database based on wishListData
            // ...
            return view('public.fav', ['cards'=>$data]);     
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
    // public function removeFromWish(Request $request, $id)
    // {
    //     // Read the 'wish' cookie from the request
    //     $wishListCookie = $request->cookie('wish');

    //     // Check if the cookie exists and has data
    //     if ($wishListCookie) {
    //         // Decrypt the cookie data and decode the JSON
    //         $decryptedCookieValue = decrypt($wishListCookie);
    //         $wishListData = json_decode($decryptedCookieValue, true);

    //         // Find the index of the item to remove
    //         $indexToRemove = array_search($id, array_column($wishListData, 'Id'));

    //         if ($indexToRemove !== false) {
    //             // Remove the item from the wish list data
    //             array_splice($wishListData, $indexToRemove, 1);

    //             // Encrypt the modified wish list data
    //             $encryptedWishListData = encrypt(json_encode($wishListData));

    //             // Update the wish list cookie with the modified data
    //             $cookie = cookie('wish', $encryptedWishListData, 30 * 24 * 60);

    //             // Create the response with the updated cookie
    //             return response()->json([
    //                 'success' => 'Item removed from wish list',     
    //             ], Response::HTTP_OK)->withCookie($cookie);   
    //             // return back()->with('success', 'Item removed from wish list')->withCookie($cookie);
    //         }
    //     }

    //     // If the 'wish' cookie is not present or the item is not found, redirect back
    //     return back();
    // }
}
