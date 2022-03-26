<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductAttribute;

class productDetailsCon extends Controller
{
    public function index($id){
        $product = Product::with('Brand','ProductAttribute','ProductImage')->find($id);
        // dd($product);
        $total_stock = ProductAttribute::where('product_id',$id)->sum('stock');
        return view('font_end.product_details',compact('product','total_stock'));
    }
}
