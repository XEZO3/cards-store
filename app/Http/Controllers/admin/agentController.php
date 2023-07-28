<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\agents;
use Illuminate\Http\Request;

class agentController extends Controller
{
    function index(){
        $data =agents::all();
        return view("admin.agents.show",['agents'=>$data]);
    }
    function delete($id){
        agents::destroy($id);
        return back()->with('success',"تم الحذف بنجاح");
    }
    function edit(agents $agent){
        return view('admin.agents.edit',['agent'=>$agent]);

    }
    function add(Request $req){
        return view('admin.agents.add');

    }
    function store(Request $req){
      $data = $req->validate([
        'name'=>"required",
        'phone_number'=>'required|numeric',
        'type'=>"required",
        'country'=>"required"
      ]);
      agents::create($data);
      return redirect("/admin/agents");
    }
    function update(Request $req,agents $agent){
        $data = $req->validate([
          'name'=>"required",
          'phone_number'=>'required|numeric',
          'type'=>"required",
          'country'=>"required"
        ]);
        $agent = agents::findOrFail($agent['id']);
        $agent->update($data);
        return redirect("/admin/agents");
      }
}
