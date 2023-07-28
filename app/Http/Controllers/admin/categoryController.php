<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class categoryController extends Controller
{
    public function index(Request $req){
        $category = category::all();
        return view("admin.category.show",['category'=>$category]);
    }
    public function delete(Request $req,$id){
        category::destroy($id);
        return back()->with('success',"تم الحذف بنجاح");
    }
    public function edit(Request $req,category $cat){
        
        return view('admin.category.edit',['category'=>$cat]);
    }

    public function add(Request $req){
        
        return view('admin.category.add');
    }

    public function store(Request $req){
        $data = $req->validate([
            'name'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Adjust the validation rules as needed
            
        ]);
        $path = $req->file('image')->store('images/product', 'public');
        $category = new category();
        $category->image = $path;
        $category->name =  $data['name'];
        $category->save();

        return redirect("/admin/category");
    }
    
    public function update(Request $req,category $cat){
        $category = category::findOrFail($cat['id']);
        if ($req->hasFile('image')) {
            // Validate the uploaded image
            $req->validate([
                'name'=>'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation rules for the image as needed
            ]);

            // Delete the old image if it exists
            if (Storage::disk('public')->exists($category['image'])) {
                Storage::disk('public')->delete($category['image']);
            }
            $path = $req->file('image')->store('images/product', 'public');

            // Update the 'path' in the database
            $category['image'] = $path;

        }
        $category['name'] = $req->input('name');
        $category->save();
        return redirect("/admin/category");
    }

}
