<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\card;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class cardController extends Controller
{
    public function index(Request $req){
        $card = card::with(['category'])->get();
        return view("admin.card.show",['card'=>$card]);
    }
    public function delete(Request $req,$id){
        card::destroy($id);
        return back()->with('success',"تم الحذف بنجاح");
    }
    public function edit(Request $req,card $card){
        $category = category::all();
        return view('admin.card.edit',['card'=>$card,'category'=>$category]);
    }

    public function add(Request $req){
        $category = category::all();
        return view('admin.card.add',['category'=>$category]);
    }

    public function store(Request $req){
        $data = $req->validate([
            'name'=>'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Adjust the validation rules as needed
            'price'=>'required|numeric',
            'category_id'=>'required|integer',
            'require_id'=>"required",
            'discount'=>'required|numeric',
            'avilability'=>'required|boolean'
            
        ]);
        $path = $req->file('image')->store('images/product', 'public');
        card::create([
            'name'=>$data['name'],
            'require_id'=>$data['require_id'],
            'image'=>$path,
            'price'=>$data['price'],
            'category_id'=>$data['category_id'],
            'discount'=>$data['discount'],
            "avilability"=>$data['avilability']
        ]);
        return redirect("/admin/cards");
    }
    
    public function update(Request $req,card $card){
        $card = card::findOrFail($card['id']);
        $data= $req->validate([
            'name'=>'required|string',
            'price'=>'required|numeric',
            'category_id'=>'required|integer',
            'discount'=>'required|numeric',
            'require_id'=>"required",
            'avilability'=>'required|boolean'
        ]);

        if ($req->hasFile('image')) {
            // Validate the uploaded image
            $req->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            ]);
            // Delete the old image if it exists
            if (Storage::disk('public')->exists($card['image'])) {
                Storage::disk('public')->delete($card['image']);
            }
            $path = $req->file('image')->store('images/product', 'public');

            // Update the 'path' in the database
            $card['image'] = $path;

        }
        $card->update([
            'name'=>$data['name'],
            'price'=>$data['price'],
            'discount'=>$data['discount'],
            'category_id'=>$data['category_id'],
            'require_id'=>$data['require_id'],
            "avilability"=>$data['avilability']
        ]);
        return redirect("/admin/cards");
    }
}
