<?php

namespace App\Http\Controllers;

use App\Models\card;
use App\Models\card_keys;
use App\Models\discounts;
use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class orderController extends Controller
{
    public function index(Request $req){
        $orders = order::with(["card"])->where('user_id',auth()->id())->get();
        return view("public.orders",['orders'=>$orders]);
    }
    public function purchasing(Request $req,card $card){
        $data = $req->validate([
            'quentity' => 'required|integer|gt:0',
            'game_id' => ($card['require_type'] == 1) ? 'required' : '',
            'username' => ($card['require_type'] == 2) ? 'required' : '',
            'password' => ($card['require_type'] == 2) ? 'required' : '',
            'discount_code' => 'nullable|string', // Add a validation rule for the discount code
        ]);
    
        $user = auth()->user();
        $discount = 0; // Initialize the discount to zero
    
        // Check if a discount code is provided and valid
        if (!empty($data['discount_code'])) {
            $discount = $this->validateDiscount($data['discount_code']); // You should implement this method
            if ($discount === null) {
                return redirect()->back()->with('error', 'Invalid discount code.');
            }
        }
    
        if ($card['require_type'] == 0) {
            $keys = card_keys::where("avilability", '1')->where("card_id", $card['id'])->take($data['quentity'])->get();
    
            if (count($keys) >= $data['quentity'] && count($keys) > 0) {
                $keysdata = "";
                $data['state'] = "done";
                foreach ($keys as $item) {
                    $keysdata .= "<p>" . $item['key'] . "</p>\n";
                    $item->update(['avilability' => 0]);
                }
                $data['keys'] = $keysdata;
            } else {
                $data['state'] = "pending";
            }
        } else {
            $data['state'] = "pending";
        }
    
        $total = ($card['price'] * (100 - $card['discount']) / 100) * (100 - ($user->rank == 1 ? 20 : ($user->rank == 2 ? 10 : ($user->rank == 3 ? 5 : 0)))) / 100 *((100-$discount) / 100)* $data['quentity'];
    
        // Apply the discount if it's valid
    
        $data['user_id'] = auth()->id();
        $data['card_id'] = $card['id'];
        $data['total'] = $total;
    
        if ($user->balance < $total) {
            return redirect()->back()->with('error', 'Your balance is not sufficient.');
        }
    
        DB::beginTransaction();
        try {
            order::create($data);
            // Update user balance
            $user->balance -= $total;
            $user->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            // Handle database transaction errors
            return redirect()->back()->with('error', 'An error occurred. Please try again later.');
        }
    
        return redirect("/orders");
    }

    private function validateDiscount($code)
{
    $discount = discounts::where("code", $code)->where("validity", 1)->first();

    return $discount ? $discount->discount : null;
}
    public function cancelOrder(order $order){
        if($order['user_id']==auth()->id() && $order['state'] =="pending"){
            DB::beginTransaction();
        try {
            $order->update(['state' => 'rejected']);
            $user = auth()->user();        
            $user->balance += $order['total'];
            $user->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            // Handle database transaction errors
            return redirect()->back()->with('error', 'حدث خطا الرجاء المحاولة لاحقا');
        }
            
            return redirect()->back()->with('success', 'تمت العملية بنجاح');
        } 
        return redirect()->back()->with('error', 'لا يمكنك الغاء هذا الطلب');
    }
}
