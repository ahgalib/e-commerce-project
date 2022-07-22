<?php 
use App\Models\Cart;
use App\Models\Product; 
use App\Models\User;
$totalcartItems = Cart::totalCartItems();
?>
@extends('layouts.front_end_layouts.frontLayout') 
@section('content') 

<div class="span9">
  
	<h3>  SHOPPING CART [<span> <small class="sumCartProduct">{{$totalcartItems}}  </small> Item(s) in your cart</span>]<a href="products.html" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Continue Shopping </a></h3>	
	<hr class="soft"/>
    @if(auth::user()->delivery_address)
	<div class="delivery-address"  style="font-size:20px;margin-bottom:10px;">
        <div class="table table-bordered">
            <h3>Delivery Address</h3>
            <td>Name: {{$deliveryInfo['user_name']}}</td>
            <td>Phone: {{$deliveryInfo['phone']}}</td>
            <td>Address: {{$deliveryInfo['address']}}</td>
            <td>District: {{$deliveryInfo['district']}}</td>
            <td>Optional phone: {{$deliveryInfo['another_phone']}}</td>
            
        </div>
    </div>
    @else
    <button><a href="/creatDeliveryAddress">Create Delivery Address Acount</a></button>		
    @endif

            <table class="table table-bordered" width="50%">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity/Update</th>
                        <th>sub Total</th>
                    </tr>
                </thead>
                <tbody>
                <?php $total_price = 0; ?>
                @foreach($cartItems as $cartInfo)
                    <?php $attrProPrice = Product::getProductAttributePrice($cartInfo['product_id'],$cartInfo['size']);  ?>
                    <tr>
                        <td> <img width="60" src="storage/{{$cartInfo['product']['main_image']}}" alt=""/></td>
                            <td>
                                <div class="input-append">
                                <input class="span1 inQunt" style="max-width:34px" placeholder="1" id="appendedInputButtons" size="16" type="text" value="{{$cartInfo['qunatity']}}">
                                                
                                </div>
                            </td>
                        <td> {{$attrProPrice['final_price'] * $cartInfo['qunatity'] }} </td>
                    </tr>
                <?php $total_price = $total_price + ($attrProPrice['final_price'] * $cartInfo['qunatity']);?>
                @endforeach
                
            
                    <tr>
                    <td colspan="2" style="text-align:right"><strong> Grand TOTAL </strong></td>
                    <td class="label label-important" style="display:block"> <strong> Tk {{ $total_price - Session::get('couponAmount')}} </strong></td>
                </tr>
                </tbody>
            </table>
        
    
	<a href="/cart" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping </a>
	
</div>
</div></div>
</div>
<!-- MainBody End ============================= -->
@endsection