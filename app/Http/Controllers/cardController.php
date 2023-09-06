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
    // public function addToWish(Request $request, $id)
    // {
    //     $existingCartList = $request->cookie('wish');
        
    //     if ($existingCartList) {
    //         $cartList = json_decode(decrypt($existingCartList), true);

    //         // Check if the item with the given 'Id' already exists in the cartList
    //         $itemIndex = null;
    //         foreach ($cartList as $index => $item) {
    //             if ($item['Id'] == $id) {
    //                 $itemIndex = $index;
    //                 break;
    //             }
    //         }

    //         if ($itemIndex !== null) {
    //             // Item already exists, do whatever you want here
    //             // For example, you can increase the quantity of the existing item
    //             return response()->json([
    //                 'success' => 'Item already exist',
    //             ], Response::HTTP_OK);
    //         } else {
    //             // Item not found in the cartList, add it to the list
    //             $cartList[] = ['Id' => $id];
    //         }
    //     } else {
    //         // No existing cartList, create a new one
    //         $cartList = [['Id' => $id]];
    //     }

    //     // Set the cookie for 30 days with proper encryption
    //     $encryptedCookieValue = encrypt(json_encode($cartList));
    //     $cookie = cookie('wish', $encryptedCookieValue, 30 * 24 * 60);

    //     // Create the response with the cookie
    //     $response = new Response('Item added to wish list');
    //     $response->withCookie($cookie);

    //     return response()->json([
    //         'success' => 'Item added to wish list',     
    //     ], Response::HTTP_OK)->withCookie($cookie);   
    //  }
    // public function addToCart(Request $request, $id)
    // {
    //     $existingCartList = $request->cookie('cart');
    //     if ($existingCartList) {
    //         $cartList = json_decode(decrypt($existingCartList), true);

    //         // Check if the item with the given 'Id' already exists in the cartList
    //         $itemIndex = null;
    //         foreach ($cartList as $index => $item) {
    //             if ($item['Id'] == $id) {
    //                 $itemIndex = $index;
    //                 break;
    //             }
    //         }

    //         if ($itemIndex !== null) {
    //             // Item already exists, do whatever you want here
    //             // For example, you can increase the quantity of the existing item
    //             $cartList[$itemIndex]['quen']= $cartList[$itemIndex]['quen']+1;

    //         } else {
    //             // Item not found in the cartList, add it to the list
    //             $cartList[] = ['Id' => $id,'quen'=>1];
    //         }
    //     } else {
    //         // No existing cartList, create a new one
    //         $cartList = [['Id' => $id,'quen'=>1]];
    //     }

    //     // Set the cookie for 30 days with proper encryption
    //     $encryptedCookieValue = encrypt(json_encode($cartList));
    //     $cookie = cookie('cart', $encryptedCookieValue, 30 * 24 * 60);

    //     // Create the response with the cookie
        

    //     return response()->json([
    //         'success' => 'Item added to cart list',     
    //     ], Response::HTTP_OK)->withCookie($cookie);  

    //     // return back()->with('success', 'Item added to cart list')->withCookie($cookie);
    // }
    // public function removeFromCart(Request $request, $id)
    // {
    //     // Read the 'wish' cookie from the request
    //     $wishListCookie = $request->cookie('cart');

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
    //             $cookie = cookie('cart', $encryptedWishListData, 30 * 24 * 60);

    //             // Create the response with the updated cookie
    //             // return response()->json([
    //             //     'success' => 'Item removed from wish list',     
    //             // ], Response::HTTP_OK)->withCookie($cookie);   
    //             return back()->with('success', 'Item removed from cart')->withCookie($cookie);
    //         }
    //     }

    //     // If the 'wish' cookie is not present or the item is not found, redirect back
    //     return back();
    // }

    // function update_quen(Request $request,$id)
    // {
    //     $add = $request->query('add');

    //     $existingCartList = $request->cookie('cart');
    //     if ($existingCartList) {
    //         $cartList = json_decode(decrypt($existingCartList), true);

    //         // Check if the item with the given 'Id' already exists in the cartList
    //         $itemIndex = null;
    //         foreach ($cartList as $index => $item) {
    //             if ($item['Id'] == $id) {
    //                 $itemIndex = $index;
    //                 break;
    //             }
    //         }

    //         if ($itemIndex !== null) {
    //             // Item already exists, do whatever you want here
    //             // For example, you can increase the quantity of the existing item
    //             if($add==1){
    //                 $cartList[$itemIndex]['quen']++;
    //             }else{
    //                 $cartList[$itemIndex]['quen']--;
    //             }

    //         } else {
    //             // Item not found in the cartList, add it to the list
    //             $cartList[] = ['Id' => $id,'quen'=>1];
    //         }
    //     } else {
    //         // No existing cartList, create a new one
    //         $cartList = [['Id' => $id,'quen'=>1]];
    //     }

    //     // Set the cookie for 30 days with proper encryption
    //     $encryptedCookieValue = encrypt(json_encode($cartList));
    //     $cookie = cookie('cart', $encryptedCookieValue, 30 * 24 * 60);

    //     // Create the response with the cookie
        

    //     return response()->json([
    //         'success' => 'Item added to cart list',     
    //     ], Response::HTTP_OK)->withCookie($cookie);  

    //     // return back()->with('success', 'Item added to cart list')->withCookie($cookie);
    // }


}
