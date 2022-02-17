<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class indexCon extends Controller
{
    public function index(){
        $page_name = "index";
        return view('front_end.index',compact('page_name'));
    }

    public function showProductDetails(){
        return view('front_end.product_details');
    }
}
