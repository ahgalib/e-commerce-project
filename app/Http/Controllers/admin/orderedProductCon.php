<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Auth;

class orderedProductCon extends Controller
{
    public function showOrderedProductPage(){
        $orderInfo = Order::with('orderProduct')->orderBy('created_at','Desc')->get()->toArray();
        return view('admin.orderedProduct.orderedProduct',compact('orderInfo'));
    }
}
