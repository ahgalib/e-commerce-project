<?php
use App\Models\section;
use App\Models\Cart;
$sections = section::sections();
$totalcartItems = Cart::totalCartItems();
?>		
<div id="sidebar" class="span3">
		<div class="well well-small"><a id="myCart" href="product_summary.blade.php"><img src="{{ url('frontEnd/images/ico-cart.png') }}" alt="cart" ><span class="sumCartProduct">{{$totalcartItems}} Item(s) </span> Items in your cart</a></div>
		<ul id="sideManu" class="nav nav-tabs nav-stacked">
			@foreach($sections as $section)
				<li class="subMenu"><a>{{$section['name']}}</a>
					@foreach($section['categories'] as $category)
						<ul>
							<li><a href="{{$category['url']}}"><i class="icon-chevron-right"></i><strong>{{$category['category_name']}}</strong></a></li>
							@foreach($category['subcategories'] as $subCateogry)
								<li><a href="{{$subCateogry['url']}}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$subCateogry['category_name']}}</a></li>
							@endforeach
						</ul>
					@endforeach
				</li>
			@endforeach
		</ul>
		<br>
		@if(isset($page_name) && $page_name == "products")
			<div class="well well-small">
				<h5>Fabric</h5>
				@foreach($fabricArray as $fabArray)
					<input type="checkbox" class="fabric" name="fabric[]" id="{{$fabArray}}" value="{{$fabArray}}">&nbsp;&nbsp;{{$fabArray}}<br>
				@endforeach
			</div>
			<div class="well well-small">
				<h5>Sleeve</h5>
				@foreach($sleeverArray as $sleeArray)
					<input type="checkbox" class="sleeve" name="sleeve[]" id="{{$sleeArray}}" value="{{$sleeArray}}">&nbsp;&nbsp;{{$sleeArray}}<br>
				@endforeach
			</div>
			<div class="well well-small">
				<h5>Pattern</h5>
				@foreach($patternArray as $patArray)
					<input type="checkbox" class="pattern" name="pattern[]" id="{{$patArray}}" value="{{$patArray}}">&nbsp;&nbsp;{{$patArray}}<br>
				@endforeach
			</div>
			<div class="well well-small">
				<h5>Fit</h5>
				@foreach($fitArray as $fitArray)
					<input type="checkbox" class="fit" name="fit[]" id="{{$fitArray}}" value="{{$fitArray}}">&nbsp;&nbsp;{{$fitArray}}<br>
				@endforeach
			</div>
			<div class="well well-small">
				<h5>Occassion</h5>
				@foreach($occassionArray as $occArray)
					<input type="checkbox" class="occassion" name="occassion[]" id="{{$occArray}}" value="{{$occArray}}">&nbsp;&nbsp;{{$occArray}}<br>
				@endforeach
			</div>
		@endif
		<br/>
		<div class="thumbnail">
			<img src="{{ url('frontEnd/images/payment_methods.png') }}" title="Payment Methods" alt="Payments Methods">
			<div class="caption">
				<h5>Payment Methods</h5>
			</div>
		</div>
	</div>