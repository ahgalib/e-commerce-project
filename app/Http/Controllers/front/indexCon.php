<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\section;
use App\Models\Product;

class indexCon extends Controller
{
    public function index(){
        $page_name = "index";
        $featuredItemCount = Product::where('is_featured','YES')->count();
        $featuredItems = Product::where('is_featured','YES')->get()->toArray();
        $featuredItemsChunk = array_chunk($featuredItems,4);
        return view('font_end.index',compact('page_name','featuredItemsChunk','featuredItemCount'));
    }

    

    public function showProductDetails(){
        return view('font_end/product_details');
    }

    public function showCompairPage(){
        return view('front_end.compair');
    }
}
