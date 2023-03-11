<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\delivery_address;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderProduct;
use auth;
use Session;
use DB;

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

    public function checkoutForm(Request $request){
        $data = $request->all();
        if(empty($data['payment_method'])){
            return back()->with('error','please select a payment method');
        }
       
        if($data['payment_method']=='paypal'){
            $payment_method = "paypal";
        }else{
            $payment_method = "cod";
        }
        $deleveryAddress = delivery_address::where('id',$data['delId'])->first()->toArray();
        DB::beginTransaction();
        Order::create([
            'user_id'=> $deleveryAddress['user_id'],
            'name'=>$deleveryAddress['user_name'],
            'address'=>  $deleveryAddress['address'],
            'district'=>  $deleveryAddress['district'],
            'phone'=>  $deleveryAddress['phone'],
            'email'=>  Auth::user()->email,
            'coupon_code'=>Session::get('couponCode'),
            'coupon_amount'=>Session::get('couponAmount'),
            'payment_method'=>$payment_method,
            'shiping_changes'=>0,
            'grand_total'=>Session::get('grand_total'),
        ]);

        $order_id = DB::getPdo()->lastInsertId();
        $cartItems = Cart::where('user_id',Auth::user()->id)->get()->toArray();
   
        foreach($cartItems as $item){
            OrderProduct::create([
                'order_id'=>$order_id,
                'user_id'=>Auth::user()->id,
                'product_id'=>$item['product_id'],
                //get product details from product details table
                $getProductDetails = Product::select('product_code','product_name','product_color','product_price')->where('id',$item['product_id'])->first()->toArray(),
                //dd($getProductDetails),
                'product_code'=>$getProductDetails['product_code'],
                'product_name'=>$getProductDetails['product_name'],
                'product_color'=>$getProductDetails['product_color'],
                'product_size'=>$item['size'],
                'product_price'=>$getProductDetails['product_price'],
                'product_qty'=>$item['qunatity'],
            ]);
         }

        Cart::where('user_id',Auth::user()->id)->delete();
        DB::commit();
        return redirect('/thanks');
    }

    public function showThanksPage(){
        return view('font_end.thanks');
    }

    public function showOrderListPage(){
        $orderInfo = Order::with('orderProduct')->where('user_id',Auth::user()->id)->first()->toArray();
       // dd($order);
        return view('font_end.orderList',compact('orderInfo'));
    }
}
