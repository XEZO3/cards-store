<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\zip_codes;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class zipCodeController extends Controller
{
    function store(Request $req){
        $data = $req->validate([
            'amount'=>"required|numeric"
        ]);
        
        zip_codes::create(
            [
                'amount'=>$data['amount'],
                'code'=>Str::random(15),
                'validity'=>true
            ]
        );
        return redirect()->back()->with('message', 'تمت العملية بنجاح');
    }
    function index(){
        $data = zip_codes::all();
        return view("admin.payment.zipcode",['codes'=>$data]);
    }
    function delete($id){
        $deletedRows = zip_codes::destroy($id);
        if ($deletedRows > 0) {
            return redirect()->back()->with('message', 'تمت العملية بنجاح');
        }else{
            return redirect()->back()->with('error', 'حدث خطا');

        }
    }
}
