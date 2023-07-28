<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class bannerControl extends Controller
{
    public function index(Request $req){
        $banners = banner::all();
        return view("admin.banners.show",['banners'=>$banners]);
    }
    public function delete(Request $req,$id){
        banner::destroy($id);
        return back()->with('success',"تم الحذف بنجاح");
    }
    public function edit(Request $req,banner $banner){
        
        return view('admin.banners.edit',['banner'=>$banner]);
    }

    public function add(Request $req){
        
        return view('admin.banners.add');
    }

    public function store(Request $req){
        $data = $req->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Adjust the validation rules as needed
            
        ]);
        $path = $req->file('image')->store('images/banner', 'public');
        $banner = new banner();
        $banner->image = $path;
        $banner->save();

        return redirect("/admin/banners");
    }
    
    public function update(Request $req,banner $banner){
        $banner = banner::findOrFail($banner['id']);
        if ($req->hasFile('image')) {
            // Validate the uploaded image
            $req->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation rules for the image as needed
            ]);

            // Delete the old image if it exists
            if (Storage::disk('public')->exists($banner['image'])) {
                Storage::disk('public')->delete($banner['image']);
            }
            $path = $req->file('image')->store('images/banner', 'public');

            // Update the 'path' in the database
            $banner['image'] = $path;

        }
        $banner->save();
        return redirect("/admin/banners");
    }
}
