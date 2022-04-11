<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductAttribute;

class productDetailsCon extends Controller
{
    public function index($id){
        $product = Product::with('Brand','ProductAttribute','ProductImage','category')->find($id);
      
        $total_stock = ProductAttribute::where('product_id',$id)->sum('stock');
        $relatedProduct = Product::where('category_id',$product['category']['id'])->where('id','!=',$id)->limit(5)->inRandomOrder()->get()->toArray();
         //dd($relatedProduct);
        return view('font_end.product_details',compact('product','total_stock','relatedProduct'));
    }

    public function ajaxProduct(Request $request){
        if($request->ajax()){
            $data = $request->all();
            //echo "<pre>";print_r($data);die;
            $getProductPrice = ProductAttribute::where(['product_id'=>$data['product_id'],'size'=>$data['size']])->first();
            return $getProductPrice->price;

        }
    }
}
