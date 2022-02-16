<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
class brandCon extends Controller
{
    public function showBrandPage(){
        $data = Brand::all(); 
        return view('admin.brand.brand',compact('data'));
    }

    public function showAddBrandPage(){
        return view('admin.brand.addbrand');
    }

    public function saveBrand(Request $req){
        $req->validate([
            'name'=>'required',
        ]);
        Brand::create([
            'name'=>$req->name,
        ]);
        return back()->with('success','brand added successfully');
    }
}
