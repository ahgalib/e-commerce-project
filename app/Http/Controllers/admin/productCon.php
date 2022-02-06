<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class productCon extends Controller
{
    public function showProductPage(){
        $data = Product::all();
        return view('admin.product.product',compact('data'));
    }
}
