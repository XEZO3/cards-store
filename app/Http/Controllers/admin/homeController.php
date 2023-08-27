<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\siteInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class homeController extends Controller
{
    function site_info(){
        $data = siteInfo::first();
        return view("admin.home.siteInfo",['siteInfo'=>$data]);
    }
    function site_info_update(Request $req,$id){
        $info = siteInfo::findOrFail($id);
        $data =  $req->validate([
            'name'=>'required',
            'email'=>'required|email',
            'phone_number'=>'required'
        ]);
        if ($req->hasFile('image')) {
            // Validate the uploaded image
            $req->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation rules for the image as needed
            ]);

            // Delete the old image if it exists
            if (Storage::disk('public')->exists($info['logo'])) {
                Storage::disk('public')->delete($info['logo']);
            }
            $path = $req->file('image')->store('images/product', 'public');

            // Update the 'path' in the database
            $info['logo'] = $path;

        }
       $info->update([
        'name'=>$data['name'],
        'email'=>$data['email'],
        'phone_number'=>$data['phone_number']
       ]);
        return redirect("/admin/info");
    }
    function service(){
        $data = siteInfo::first();
        return view("admin.home.service",['siteInfo'=>$data]);

    }
    function service_update(Request $req,$id){
        $info = siteInfo::findOrFail($id);
        $data =  $req->validate([
            'service'=>'required',
        ]);
        $info->update($data);
        return redirect("/admin/service");
    }
    function terms(){
        $data = siteInfo::first();
        return view("admin.home.terms",['siteInfo'=>$data]);
    }
    function terms_update(Request $req,$id){
        $info = siteInfo::findOrFail($id);
        $data =  $req->validate([
            'terms'=>'required',
        ]);
        $info->update($data);
        return redirect("/admin/terms");
    }
}
