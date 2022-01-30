<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\section;

class categoryCon extends Controller
{
    public function showCategoriesPage(){
        $data = category::all();
        return view('admin.categories.categories',compact('data'));
    }

    public function showAddCategoriesPage(){
        $data = section::all();
        return view('admin.categories.addcategories',['data'=>$data]);
    }

    public function saveAddCategory(Request $req){
        $req->validate([
            'parent_id'=>'required',
            'section_id'=>'required',
            'category_name'=>'required',
            'category_image'=>'required',
            'description'=>'required',
            'status'=>'required'
        ]);
       
        category::create([
            'parent_id'=>$req->parent_id,
            'section_id'=>$req->section_id,
            'category_name'=>$req->category_name,
           
            'category_image'=>request('category_image')->store('category_image','public'),
            'category_descount'=>$req->category_descount,
            'description'=>$req->description,
            'url'=>$req->url,
            'meta_title'=>$req->meta_title,
            'meta_description'=>$req->meta_description,
            'meta_keywords'=>$req->meta_keywords,
            'status'=>$req->status,
        ]);
        return back();
    }
}
