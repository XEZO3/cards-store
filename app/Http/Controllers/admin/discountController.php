<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\discounts;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class discountController extends Controller
{
    function store(Request $req){
        $data = $req->validate([
            'discount'=>"required|numeric"
        ]);
        
        discounts::create(
            [
                'discount'=>$data['discount'],
                'code'=>Str::random(8),
                'validity'=>true
            ]
        );
        return redirect()->back()->with('message', 'تمت العملية بنجاح');
    }
    function index(){
        $data = discounts::all();
        return view("admin.home.discount",['codes'=>$data]);
    }
    function delete($id){
        $deletedRows = discounts::destroy($id);
        if ($deletedRows > 0) {
            return redirect()->back()->with('message', 'تمت العملية بنجاح');
        }else{
            return redirect()->back()->with('error', 'حدث خطا');

        }
    }
}
