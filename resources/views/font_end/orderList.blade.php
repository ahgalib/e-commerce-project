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
	<table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>District</th>
                <th>Phone</th>
                <th>email</th>    
            </tr>
        </thead>
        <tbody>	
            <tr>
                <td>{{$orderInfo['name']}}</td>
                <td>{{$orderInfo['address']}}</td>
                <td>{{$orderInfo['district']}}</td>
                <td>{{$orderInfo['phone']}}</td> 
                <td>{{$orderInfo['email']}}</td>
                
            </tr>
        </tbody>
    </table>

	<h3>Your oderede product are</h3>
	<table class="table table-bordered">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Color</th>
                <th>Size</th>
                <th>Price</th>
                <th>Quantity</th>
             </tr>
        </thead>
        <tbody>	
            @foreach($orderInfo['order_product'] as $product)
                <tr>
                    <td>{{$product['product_name']}}</td>
                    <td>{{$product['product_color']}}</td>
                    <td>{{$product['product_size']}}</td>
                    <td>{{$product['product_price']}}</td>
                    <td>{{$product['product_qty']}}</td>
                </tr>
            @endforeach 
        </tbody>
    </table>		
	
    
		
	<a href="/cart" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping </a>
	<a href="/checkOut" class="btn btn-large pull-right">Next <i class="icon-arrow-right"></i></a>
	
</div>
</div></div>
</div>
<!-- MainBody End ============================= -->
@endsection