<?php use App\Models\Product ; ?>
<div class="tab-content filter_product">
	<div class="tab-pane  active" id="blockView">
		<ul class="thumbnails">
			@foreach($cateProduct as $product)
				<li class="span3">
					<div class="thumbnail">
						<a href="/product_details/{{$product->id}}"><img src="storage/{{$product->main_image}}" style="width:300px;height:250px;" alt=""/></a>
						<div class="caption">
							<h5>{{$product->product_name}}</h5>
							<p>
							{{$product->brand->name}}
							</p>
							<?php $discountedPrice = Product::getProductDiscount($product->id); ?>
							<h4 style="text-align:center"><a class="btn" href="/product_details/{{$product->id}}"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">
							@if($discountedPrice >0)
								<del>Tk.{{$product->product_price}}</del>
							@else
								{{$product->product_price}}
							@endif
							</a>
							</h4>
							@if($discountedPrice >0)
						
							<h4 style="text-align:center;"><span style="color:red;font-wight:bold;text-align:center;">{{$product->product_discount}}% off !!</span></h4>
								<h3 style="color:red;font-wight:bold;text-align:center;">Only {{$discountedPrice}} TK</h3>
							
							@endif

							<!-- this is category discount part -->
								<!-- @if($discountedPrice >0)
								<h4 style="text-align:center;"><span style="color:red;font-wight:bold;text-align:center;">{{$product['category']['category_discount']}}% off !!</span></h4>
									<h3 style="color:red;font-wight:bold;text-align:center;">Only {{$discountedPrice}} TK</h3>
								
								@endif -->
							<!-- end category discount part -->
							
							<!-- some of cloth quality start for the ajax perpose-->
								<!-- <h5>{{$product->fabric}}</h5>
								<h5>{{$product->sleeve}}</h5>
								<h5>{{$product->pattern}}</h5>
								<h5>{{$product->fit}}</h5>
								<h5>{{$product->occassion}}</h5> -->
							<!-- some of cloth quality end -->
						</div>
					</div>
				</li>
			@endforeach
		</ul>
		<hr class="soft"/>
	</div>
</div>