<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class officeController extends Controller
{
    public function index(Request $req){
        $office = office::all();
        return view("admin.office.show",['office'=>$office]);
    }
    public function delete(Request $req,$id){
        office::destroy($id);
        return back()->with('success',"تم الحذف بنجاح");
    }
    public function edit(Request $req,office $office){
        
        return view('admin.office.edit',['office'=>$office]);
    }

    public function add(Request $req){
        
        return view('admin.office.add');
    }

    public function store(Request $req){
        $data = $req->validate([
            'name'=>'required',
            'reciver_name'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Adjust the validation rules as needed
            
        ]);
        $path = $req->file('image')->store('images/office', 'public');
        $office = new office();
        $office->image = $path;
        $office->name =  $data['name'];
        $office['reciver_name'] = $data['reciver_name'];
        $office->save();

        return redirect("/admin/office");
    }
    
    public function update(Request $req,office $office){
        $office = office::findOrFail($office['id']);
        if ($req->hasFile('image')) {
            // Validate the uploaded image
            $req->validate([
                'name'=>'required',
                'reciver_name'=>'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation rules for the image as needed
            ]);

            // Delete the old image if it exists
            if (Storage::disk('public')->exists($office['image'])) {
                Storage::disk('public')->delete($office['image']);
            }
            $path = $req->file('image')->store('images/office', 'public');

            // office the 'path' in the database
            $office['image'] = $path;

        }
        $office['name'] = $req->input('name');
        $office['reciver_name'] = $req->input('reciver_name');
        $office->save();
        return redirect("/admin/office");
    }
}
