<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\balance;
use App\Models\User;
use App\Models\zip_codes;
use Illuminate\Http\Request;


class balanceController extends Controller
{
      public function index(){
        $data = balance::with(['user','payment_methods'])->get()->groupBy('state');       
        return view("admin.payment.balance",['data'=>$data]);
      }
      public function update($id,$state){
        $orders = balance::find($id);
        if($orders !=null){
        switch($state){
            
            case 1:
                if($orders['state']=="pending"){
                    $user = User::find($orders['user_id']);
                    $this->updateUserBalance($user,$orders['balance']);
                    $orders->update(['state'=>"done"]);
                }else{
                    $orders->update(['state'=>"done"]);
                }
                break;
            case 2:
                $orders->update(['state'=>"rejected"]);
                break;
            case 3:
                $user = User::find($orders['user_id']);
                $this->updateUserBalance($user,$orders['balance']);
                $orders->update(['state'=>"loan"]);
                break;
        }
        return redirect()->back()->with('message', 'تمت العملية');     
    }
    return redirect()->back()->with('error', 'حدث خطا');     
        
      }

    public function updateUserBalance($user, $balance)
    {
        $user->balance += $balance;
        $user->total_balance += $balance;
        $totalBalance = $user->total_balance;
        if ($totalBalance >= 100 && $totalBalance <= 500) {
            $user->rank = 3;
        } elseif ($totalBalance >= 500 && $totalBalance <= 1000) {
            $user->rank = 2;
        } elseif ($totalBalance >= 1200) {
            $user->rank = 1;
        }
        $user->save();
    }
}
