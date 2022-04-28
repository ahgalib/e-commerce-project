<?php use App\Models\Product ; ?>
 @extends('layouts.front_end_layouts.frontLayout') 
  @section('content') 
		<div class="span9">
			<ul class="breadcrumb">
				<li><a href="/">Home</a> <span class="divider">/</span></li>
				<li><a href="{{url('/'.$product['category']['url'])}}">{{$product['category']['category_name']}}</a> <span class="divider">/</span></li>
				<li class="active">{{$product['product_name']}}</li>
			</ul>
			<div class="row">
				<div id="gallery" class="span3">
					<a href="/storage/{{$product['main_image'] }}" title="Blue Casual T-Shirt">
						<img src="/storage/{{$product['main_image'] }}" style="width:100%" alt="Blue Casual T-Shirt"/>
					</a>
					<div id="differentview" class="moreOptopm carousel slide">
						<div class="carousel-inner">
							<div class="item active">
								@foreach($product['ProductImage'] as $product_images)
									<a href="/storage/{{$product_images['image']}}"> <img style="width:29%" src="/storage/{{$product_images['image']}}" alt=""/></a>
								@endforeach
							</div>
							<div class="item">
								@foreach($product['ProductImage'] as $product_images)
									<a href="/storage/{{$product_images['image']}}" > <img style="width:29%" src="/storage/{{$product_images['image']}}" alt=""/></a>
								@endforeach
							</div>
						</div>
						<!--
									<a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
						<a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
						-->
					</div>
					
					<div class="btn-toolbar">
						<div class="btn-group">
							<span class="btn"><i class="icon-envelope"></i></span>
							<span class="btn" ><i class="icon-print"></i></span>
							<span class="btn" ><i class="icon-zoom-in"></i></span>
							<span class="btn" ><i class="icon-star"></i></span>
							<span class="btn" ><i class=" icon-thumbs-up"></i></span>
							<span class="btn" ><i class="icon-thumbs-down"></i></span>
						</div>
					</div>
				</div>
				<div class="span6">
					@if(Session::get('success'))
						<div class="alert alert-danger">
							{{Session::get('success')}}
						</div>
					@endif
					@if(Session::get('dangerMessage'))
 						<div class="alert alert-danger">
							 {{Session::get('dangerMessage')}}
						 </div>
					@endif
					<h3>{{$product['product_name']}}</h3>
					<small>{{$product['Brand']['name']}}</small>
					<hr class="soft"/>
					<small> {{$total_stock}} item in stock</small>
					<form action="{{url('add-to-cart')}}" method="post" class="form-horizontal qtyFrm">
						@csrf
						<input type="hidden" name="product_id" value="{{$product['id']}}">
						<div class="control-group">
						<?php $discountedPrice = Product::getProductDiscount($product->id); ?>
							<h4 class="getAttrPrice"><del><span style="color:red;font-wight:bold;text-align:center;">{{$product['product_price']}}</span></del> <span style="color:green;font-wight:bold;text-align:center;">Only {{$discountedPrice}}!!</span></h4>
							
 								<!-- <p style="color:red;">please select a size</p> -->
								<select name="size" id="getPrice"class="span2 pull-left showProductSize" product-id="{{$product['id']}}" required="">
                                  		<option value="">select size</option>
									@foreach($product['ProductAttribute'] as $attribute)
										<option value="{{$attribute['size']}}">{{$attribute['size']}}</option>
									@endforeach
								</select>
								<input name="quantity" type="number" class="span1" placeholder="Qty." required/>
								<button type="submit" class="btn btn-large btn-primary pull-right"> Add to cart <i class=" icon-shopping-cart"></i></button>
							</div>
							
						</div>
					</form>
				
					<hr class="soft clr"/>
					<p class="span6">
						Our Blue Casual Polo T-Shirt has a simple yet sophisticated design which makes it perfect for all outings, starting from regular morning jogs to casual outings and night walks. Coming to the functionality part, it’s antimicrobial, breathable and moisture-wicking features make it an essential wardrobe staple!
						
					</p>
					<a class="btn btn-small pull-right" href="#detail">More Details</a>
					<br class="clr"/>
					<a href="#" name="detail"></a>
					<hr class="soft"/>
				</div>
				
				<div class="span9">
					<ul id="productDetail" class="nav nav-tabs">
						<li class="active"><a href="#home" data-toggle="tab">Product Details</a></li>
						<li><a href="#profile" data-toggle="tab">Related Products</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade active in" id="home">
							<h4>Product Information</h4>
							<table class="table table-bordered">
								<tbody>
									<tr class="techSpecRow"><th colspan="2">Product Details</th></tr>
									<tr class="techSpecRow"><td class="techSpecTD1">Brand: </td><td class="techSpecTD2">{{$product['Brand']['name']}}</td></tr>
									<tr class="techSpecRow"><td class="techSpecTD1">Code:</td><td class="techSpecTD2">{{$product['product_code']}}</td></tr>
									<tr class="techSpecRow"><td class="techSpecTD1">Color:</td><td class="techSpecTD2">{{$product['product_color']}}</td></tr>
									<tr class="techSpecRow"><td class="techSpecTD1">Fabric:</td><td class="techSpecTD2">{{$product['fabric']}}</td></tr>
									<tr class="techSpecRow"><td class="techSpecTD1">Pattern:</td><td class="techSpecTD2">{{$product['pattern']}}</td></tr>
								</tbody>
							</table>
							
							<h5>Washcare</h5>
							<p>Machine Wash</p>
							<h5>Disclaimer</h5>
							<p>
								There may be a slight color variation between the image shown and original product.
							</p>
						</div>
						<div class="tab-pane fade" id="profile">
							<div id="myTab" class="pull-right">
								<a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
								<a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
							</div>
							<br class="clr"/>
							<hr class="soft"/>
							<div class="tab-content">
								<div class="tab-pane" id="listView">
									@foreach($relatedProduct as $similerProduct)
										<div class="row">
											<div class="span2">
												<img src="/storage/{{$similerProduct['main_image']}}" alt=""/>
											</div>
											<div class="span4">
											
												<h3>New | Available</h3>
												<hr class="soft"/>
												<h5>{{$similerProduct['product_name']}} </h5>
												<p>
												{{$similerProduct['description']}}
												</p>
												<a class="btn btn-small pull-right" href="/product_details/{{$similerProduct['id']}}">View Details</a>
												<br class="clr"/>
											</div>
											<div class="span3 alignR">
												<form class="form-horizontal qtyFrm">
													<h3> Rs.1000</h3>
													<label class="checkbox">
														<input type="checkbox">  Adds product to compair
													</label><br/>
													<div class="btn-group">
														<a href="/product_details" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
														<a href="/product_details" class="btn btn-large"><i class="icon-zoom-in"></i></a>
													</div>
												</form>
											</div>
										</div>
										<hr class="soft"/>
									@endforeach	
								</div>
								<div class="tab-pane active" id="blockView">
									<ul class="thumbnails">
										@foreach($relatedProduct as $similerProduct)
										<li class="span3">
											<div class="thumbnail">
												<a href="/product_details/{{$similerProduct['id']}}"><img src="/storage/{{$similerProduct['main_image']}}" alt=""/></a>
												<div class="caption">
													<h5>{{$similerProduct['product_name']}}</h5>
													<p>
														{{$similerProduct['description']}}
													</p>
													<h4 style="text-align:center"><a class="btn" href="/product_details/{{$similerProduct['id']}}"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">Rs.1000</a></h4>
												</div>
											</div>
										</li>
										@endforeach
										
									</ul>
									<hr class="soft"/>
								</div>
							</div>
							<br class="clr">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> </div>
</div>
<!-- MainBody End ============================= -->
@endsection