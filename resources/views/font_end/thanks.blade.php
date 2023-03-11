<?php 
use App\Models\Cart;
$totalcartItems = Cart::totalCartItems();
?>
@extends('layouts.front_end_layouts.frontLayout') 
@section('content') 

<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active"> SHOPPING CART</li>
    </ul>
	
	<hr class="soft"/>
			
	<div style="margin-bottom:50px;">
        <h4>Your Order has been placed successfully...ThankYou for your order <a href="/showOrderList">See your Order</a></h4>
    </div>		
		
	<a href="/cart" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping </a>
	<a href="/checkOut" class="btn btn-large pull-right">Next <i class="icon-arrow-right"></i></a>
	
</div>
</div></div>
</div>
<!-- MainBody End ============================= -->
@endsection