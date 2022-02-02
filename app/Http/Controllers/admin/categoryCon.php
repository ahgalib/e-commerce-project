<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\section;

class categoryCon extends Controller
{
    public function showCategoriesPage(){
        $data = category::get();
        return view('admin.categories.categories',compact('data'));
    }

    public function showAddCategoriesPage(){
        $data = section::all();
        return view('admin.categories.addcategories',['data'=>$data]);
    }

    public function saveAddCategory(Request $req){
        $req->validate([
           // 'parent_id'=>'required',
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
            'category_discount'=>$req->category_discount,
            'description'=>$req->description,
            'url'=>$req->url,
            'meta_title'=>$req->meta_title,
            'meta_description'=>$req->meta_description,
            'meta_keywords'=>$req->meta_keywords,
            'status'=>$req->status,
        ]);
        //This is another way to show message
        // $successMessage = "Category Added Successfully";
        // session::flash('addSuccess',$successMessage);
        return redirect('admin/categories')->with('addSuccess','Category Added Successfully');
    }

    public function appendCategoriesLevel(Request $request){
        if($request->ajax()){
            $data = $request->all();
            
            $getCategory = category::with('subcategories')->where(['section_id'=>$data['section_id'],'parent_id'=>0,'status'=>1])->get();
            $getCategories = json_decode(json_encode($getCategory),true);//data aslo ki na seita dekhar jonno
            // echo "<pre>";print_r($getCategories);die;
            return view('admin.categories.append_category_level',['getCategory'=>$getCategory]);
        }
    }

    public function showEditCategoriesPage($category){
        $category = category::find($category);
         $data = section::all();
        $getCategory = category::with('subcategories')->where(['parent_id'=>0,'section_id'=>$category['section_id']])->get();
        // $getCategory = json_decode(json_encode($getCategory),true);
        // echo "<pre>";print_r($getCategory);die;
       
        return view('admin.categories.editcategory',['category'=>$category,'data'=>$data,'getCategory'=>$getCategory]);
    }

    public function saveEditCategoriesPage(category $category,Request $request){
        $data = request()->validate([
            // 'parent_id'=>'required',
            'section_id'=>'required',
            'category_name'=>'required',
            'category_image'=>'',
            'category_discount'=>'',
            'description'=>'required',
            'url'=>'',
            'meta_title'=>'',
            'meta_description'=>'',
            'meta_keywords'=>'',
            'status'=>'required'
        ]);
        if(request('category_image')){
            $imagePath = request('category_image')->store('category_image','public');
            $imageArray = ['category_image'=>$imagePath];
        }
         category::with('subcategories')->where(['id'=>$category['id']])->update(array_merge(
            $data,
            $imageArray ??[],
         ));
        
         return redirect('admin/categories')->with('editSuccess','Category Edited Successfully');
    }

    public function deleteCategory($category){
        category::find($category)->delete();
        return back()->with('success','Category Deleted Successfully');
    }
}
