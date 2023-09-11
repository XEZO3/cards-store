<?php

use App\Models\discounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('/validate-discount', function (Request $request) {
    $discountCode = $request->input('discount_code');
    $discount = discounts::where("code",$discountCode)->where("validity",1)->first();

    if ($discount != null) {
        // Valid discount code, return a JSON response with validity and applied discount.
        return response()->json(['valid' => true, 'discount' => $discount['discount']]); // 10% discount
    }

    // Invalid discount code, return a JSON response with validity as false.
    return response()->json(['valid' => false]);
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
