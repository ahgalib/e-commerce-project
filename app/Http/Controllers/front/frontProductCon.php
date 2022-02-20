<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\Product;

class frontProductCon extends Controller
{
    public function pageListing($url){
        $productListing = category::where('url',$url)->count();
        if($productListing>0){
           $categoryDetails =  category::categoryDetails($url);
            $cateProduct = Product::whereIn('category_id',$categoryDetails['catIds'])->get();
           //echo "<pre>";print_r($cateProduct);die();
            return view('font_end.products',compact('cateProduct','categoryDetails'));
          
        }else{
           abort(404);
        }
    }
}
