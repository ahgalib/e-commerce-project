<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\section;

class productCon extends Controller
{
    public function showProductPage(){
        $data = Product::all();
        return view('admin.product.product',compact('data'));
    }

    public function deleteProduct($product){
        Product::find($product)->delete();
        return back()->with('success','Category Deleted Successfully');
    }

    public function showAddProductPage(){
        //Filter Array
        $fabricArray = array('Cotton','Polyester','Woll');
        $sleeverArray = array('Ful Sleeve','Half Sleeve','Short Sleeve','Sleeveless');
        $patternArray = array('Checked','Plain','Printed','Self','Solid');
        $fitArray = array('Regular','Silm');
        $occassionArray = array('Casual','Formal');

        //relation between section,categories and product
        $categories = section::with('categories')->get();
        // $cata = json_decode(json_encode($cata),true);
        // echo "<pre>";print_r($cata);die;

        return view('admin.product.addproduct',compact('fabricArray','sleeverArray','patternArray','fitArray','occassionArray','categories'));
    }
}
