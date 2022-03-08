<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\Product;

class frontProductCon extends Controller
{
    public function pageListing($url,Request $request){
        if($request->ajax()){
            $data = $request->all();
           // echo"<pre>";print_r($data);die;
           $productListing = category::where('url',$url)->count();
            if($productListing>0){
                $categoryDetails =  category::categoryDetails($url);
                $cateProduct = Product::whereIn('category_id',$categoryDetails['catIds']);
                //echo "<pre>";print_r($cateProduct);die();
                
                //Sort option
                if(isset($_GET['sort']) && !empty($_GET['sort'])){
                    if($_GET['sort'] == 'product_latest'){
                        $cateProduct->orderBy('id','Desc');
                    }
                    if($_GET['sort'] == 'product_a_z'){
                        $cateProduct->orderBy('product_name','Asc');
                    }
                    if($_GET['sort'] == 'product_z_a'){
                        $cateProduct->orderBy('product_name','Desc');
                    }
                    if($_GET['sort'] == 'product_price_highest_lowest'){
                        $cateProduct->orderBy('product_price','Desc');
                    }
                    if($_GET['sort'] == 'product_price_lowest_highest'){
                        $cateProduct->orderBy('product_price','Asc');
                    }
                }else{
                    $cateProduct->orderBy('id','Desc');
                }
                $cateProduct = $cateProduct->simplePaginate(10);
                return view('font_end.products',compact('cateProduct','categoryDetails','url'));
            
            }else{
            abort(404);
            }
        }else
        {
            $productListing = category::where('url',$url)->count();
            if($productListing>0){
                $categoryDetails =  category::categoryDetails($url);
                $cateProduct = Product::whereIn('category_id',$categoryDetails['catIds']);
                //echo "<pre>";print_r($cateProduct);die();
                
                //Sort option
                
                $cateProduct = $cateProduct->simplePaginate(10);
                return view('font_end.products',compact('cateProduct','categoryDetails','url'));
            
            }else{
            abort(404);
            }
        }
    }
}
