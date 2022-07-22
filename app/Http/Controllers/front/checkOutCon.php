<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\delivery_address;
use auth;

class checkOutCon extends Controller
{
    public function showCheckOutPage(){
        $cartItems = Cart::userCartItems();
        $deliveryInfo = delivery_address::where('user_id',auth::user()->id)->first();
        return view('font_end/checkOutPage',compact('cartItems','deliveryInfo'));
    }

    public function showDeliveryAddressPage(){
        return view('font_end/createDeliveryAddress');
    }

    public function saveDeliveryAddress(Request $request){
        $data = $request->all();
        $request->validate([
            'address'=>'required',
            'district'=>'required',
            'phone'=>'required',
            'another_phone'=>'required',
        ]);

        delivery_address::create([
            'user_id'=>auth::user()->id,
            'user_name'=>auth::user()->name,
            'address'=>$data['address'],
            'district'=>$data['district'],
            'phone'=>$data['phone'],
            'another_phone'=>$data['another_phone'],
        ]);

        return redirect('/checkOut');
    }
}
