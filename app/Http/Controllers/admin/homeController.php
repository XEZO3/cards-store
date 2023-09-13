<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\balance;
use App\Models\order;
use App\Models\siteInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class homeController extends Controller
{
   public function dashboard() {
    // Get the current month and year
    $currentMonth = date('n'); // Get the current month (1 to 12)
    $currentYear = date('Y');

    // Calculate the starting month (12 months ago) and year based on the current month
    $startMonth = $currentMonth - 12;
    $startYear = $currentYear;

    if ($startMonth <= 0) {
        $startMonth += 12; // Handle wrap-around for months before January
        $startYear--; // Decrement the year when wrapping around
    }

    // Fetch data for the last 12 months, including the current month
    $balances = balance::select(DB::raw("SUM(price) as total_charged"))
        ->where(function ($query) use ($currentYear, $startYear, $currentMonth, $startMonth) {
            $query->whereYear('created_at', '>=', $startYear)
                ->orWhere(function ($query) use ($currentYear, $startYear, $currentMonth,$startMonth) {
                    $query->whereYear('created_at', '=', $startYear)
                        ->whereMonth('created_at', '>=', $startMonth);
                });
        })
        ->whereMonth('created_at', '<=', $currentMonth)
        ->where('state', 'done')
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck("total_charged");

    $orderCounts = balance::select(DB::raw("COUNT(*) as total_orders"))
        ->where(function ($query) use ($currentYear, $startYear, $currentMonth, $startMonth) {
            $query->whereYear('created_at', '>=', $startYear)
                ->orWhere(function ($query) use ($currentYear, $startYear, $currentMonth, $startMonth) {
                    $query->whereYear('created_at', '=', $startYear)
                        ->whereMonth('created_at', '>=', $startMonth);
                });
        })
        ->whereMonth('created_at', '<=', $currentMonth)
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck("total_orders");

    $months = balance::select(DB::raw("Month(created_at) as month"))
        ->where(function ($query) use ($currentYear, $startYear, $currentMonth, $startMonth) {
            $query->whereYear("created_at", '>=', $startYear)
                ->orWhere(function ($query) use ($currentYear, $startYear, $currentMonth,$startMonth) {
                    $query->whereYear('created_at', '=', $startYear)
                        ->whereMonth('created_at', '>=', $startMonth);
                });
        })
        ->whereMonth('created_at', '<=', $currentMonth)
        ->where('state', 'done')
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck("month");
    
    $datas = array_fill(0, 12, 0); // Initialize an array for 12 months with 0 values
    $orderCountsArray = array_fill(0, 12, 0); // Initialize an array for 12 months with 0 order counts
    foreach ($months as $index => $month) {
        $offset = ($currentMonth - $month + 12) % 12; // Calculate the correct index in reverse order
        $datas[$offset] = $balances[$index];
        $orderCountsArray[$offset] = $orderCounts[$index];
    }

    return view("admin.home.inventory_manage", ['balance' => $datas, 'orderCounts' => $orderCountsArray]);
}
    

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
