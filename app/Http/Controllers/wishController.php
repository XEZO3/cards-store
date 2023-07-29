<?php

namespace App\Http\Controllers;

use App\Models\card;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class wishController extends Controller
{
    public function removeFromWish(Request $request, $id)
    {
        // Read the 'wish' cookie from the request
        $wishListCookie = $request->cookie('wish');

        // Check if the cookie exists and has data
        if ($wishListCookie) {
            // Decrypt the cookie data and decode the JSON
            $decryptedCookieValue = decrypt($wishListCookie);
            $wishListData = json_decode($decryptedCookieValue, true);

            // Find the index of the item to remove
            $indexToRemove = array_search($id, array_column($wishListData, 'Id'));

            if ($indexToRemove !== false) {
                // Remove the item from the wish list data
                array_splice($wishListData, $indexToRemove, 1);

                // Encrypt the modified wish list data
                $encryptedWishListData = encrypt(json_encode($wishListData));

                // Update the wish list cookie with the modified data
                $cookie = cookie('wish', $encryptedWishListData, 30 * 24 * 60);

                // Create the response with the updated cookie
                return response()->json([
                    'success' => 'Item removed from wish list',     
                ], Response::HTTP_OK)->withCookie($cookie);   
                // return back()->with('success', 'Item removed from wish list')->withCookie($cookie);
            }
        }

        // If the 'wish' cookie is not present or the item is not found, redirect back
        return back();
    }
    function fav(Request $req){
        $wishListCookie = $req->cookie('wish');
        try{
            $decryptedCookieValue = decrypt($wishListCookie);
            $wishListData = json_decode($decryptedCookieValue, true);
            }catch(DecryptException $e){
                return view('public.fav', ['cards'=>[]]); 
            }
        
            // Decrypt the cookie data and decode the JSON
          
                $decryptedCookieValue = decrypt($wishListCookie);
                $wishListData = json_decode($decryptedCookieValue, true);
                $idList = array_map('intval', array_column($wishListData, 'Id'));
                $data = card::whereIn('id',$idList)->get();
               
            // Your existing code to fetch the items from the database based on wishListData
            // ...
            return view('public.fav', ['cards'=>$data]);     
    }

    public function addToWish(Request $request, $id)
    {
        $existingCartList = $request->cookie('wish');
        
        if ($existingCartList) {
            $cartList = json_decode(decrypt($existingCartList), true);

            // Check if the item with the given 'Id' already exists in the cartList
            $itemIndex = null;
            foreach ($cartList as $index => $item) {
                if ($item['Id'] == $id) {
                    $itemIndex = $index;
                    break;
                }
            }

            if ($itemIndex !== null) {
                // Item already exists, do whatever you want here
                // For example, you can increase the quantity of the existing item
                return response()->json([
                    'success' => 'Item already exist',
                ], Response::HTTP_OK);
            } else {
                // Item not found in the cartList, add it to the list
                $cartList[] = ['Id' => $id];
            }
        } else {
            // No existing cartList, create a new one
            $cartList = [['Id' => $id]];
        }

        // Set the cookie for 30 days with proper encryption
        $encryptedCookieValue = encrypt(json_encode($cartList));
        $cookie = cookie('wish', $encryptedCookieValue, 30 * 24 * 60);

        // Create the response with the cookie
        $response = new Response('Item added to wish list');
        $response->withCookie($cookie);

        return response()->json([
            'success' => 'Item added to wish list',     
        ], Response::HTTP_OK)->withCookie($cookie);   
     }
}
