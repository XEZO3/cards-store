<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\news;
use Illuminate\Http\Request;

class newsController extends Controller
{
    function index(){
        $data =news::all();
        return view("admin.news.show",['news'=>$data]);
    }
    function delete($id){
        news::destroy($id);
        return back()->with('success',"تم الحذف بنجاح");
    }
    function edit(news $news){
        return view('admin.news.edit',['news'=>$news]);

    }
    function add(Request $req){
        return view('admin.news.add');

    }
    function store(Request $req){
      $data = $req->validate([
        'news'=>"required",      
      ]);
      news::create($data);
      return redirect("/admin/news");
    }
    function update(Request $req,news $news){
        $data = $req->validate([
          'news'=>"required",
        ]);
        $agent = news::findOrFail($news['id']);
        $agent->update($data);
        return redirect("/admin/news");
      }
}
