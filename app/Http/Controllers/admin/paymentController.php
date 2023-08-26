<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\payment_methods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class paymentController extends Controller
{
    public function index(Request $req){
        $payment = payment_methods::all();
        return view("admin.payment.show",['payment'=>$payment]);
    }
    public function delete(Request $req,$id){
        payment_methods::destroy($id);
        return back()->with('success',"تم الحذف بنجاح");
    }
    public function edit(Request $req,payment_methods $payment){
        if ($payment === null) {
            // Handle the case where $payment is null
            // For example, you can return an error view or redirect back with a message
            return redirect()->back()->with('error', 'Payment method not found.');
        }
        return view('admin.payment.edit', ['payment' => $payment]);

    }

    public function add(Request $req){
        
        return view('admin.payment.add');
    }


    public function store(Request $req){
        $data = $req->validate([
            'name'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Adjust the validation rules as needed
            'wallet'=>"required",
            'ex_price'=>"required|numeric|gt:0"

        ]);
        $path = $req->file('image')->store('images/payment', 'public');
        $payment = new payment_methods();
        $payment->image = $path;
        $payment->name =  $data['name'];
        $payment->wallet =  $data['wallet'];
        $payment->ex_price =  $data['ex_price'];
        $payment->save();
        return redirect("/admin/payment")->with('message', 'تمت العملية');

    }
    public function update(Request $req,payment_methods $payment){
        $payment = payment_methods::findOrFail($payment['id']);
        if ($req->hasFile('image')) {
            // Validate the uploaded image
            $req->validate([
                'name'=>'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'wallet'=>"required",
                'ex_price'=>"required|numeric|gt:0"
            ]);

            // Delete the old image if it exists
            if (Storage::disk('public')->exists($payment['image'])) {
                Storage::disk('public')->delete($payment['image']);
            }
            $path = $req->file('image')->store('images/product', 'public');

            // Update the 'path' in the database
            $payment['image'] = $path;

        }
        $payment['name'] = $req->input('name');
        $payment['wallet'] = $req->input('wallet');
        $payment['ex_price'] = $req->input('ex_price');
        $payment->save();
        return redirect("/admin/payment");
    }
}
