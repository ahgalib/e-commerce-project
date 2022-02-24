@extends('layouts.front_end_layouts.frontLayout') 
@section('content') 
		<div class="span9">
			<ul class="breadcrumb">
				<li><a href="/">Home</a> <span class="divider">/</span></li>
				<li class="active"><?php echo $categoryDetails['breadcrums']?></li>
			</ul>
			<h3> {{$categoryDetails['categoryDetails']['category_name']}}<small class="pull-right"> {{count($cateProduct)}} products are available </small></h3>
			<hr class="soft"/>
			<p>
				Nowadays the lingerie industry is one of the most successful business spheres.We always stay in touch with the latest fashion tendencies - that is why our goods are so popular and we have a great number of faithful customers all over the country.
			</p>
			<hr class="soft"/>
			<form name="sortProducts" id="sortProducts" class="form-horizontal span6" method="get">
				<div class="control-group">
					<label class="control-label alignL">Sort By </label>
					<select name="sort" id="sort">
						<option value="">select</option>
						<option value="product_latest" @if($_GET['sort'] && $_GET['sort']=='product_latest') selected @endif>Latest Product</option>
						<option value="product_a_z" @if($_GET['sort'] && $_GET['sort']=='product_a_z') selected @endif>Priduct name A - Z</option>
						<option value="product_z_a" @if($_GET['sort'] && $_GET['sort']=='product_z_a') selected @endif>Priduct name Z - A</option>
						<option value="product_price_highest_lowest" @if($_GET['sort'] && $_GET['sort']=='product_price_highest_lowest') selected @endif>Highest first</option>
						<option value="product_price_lowest_highest"@if($_GET['sort'] && $_GET['sort']=='product_price_lowest_highest') selected @endif>Lowest first</option>
					</select>
				</div>
			</form>
			
			<div id="myTab" class="pull-right">
				<a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
				<a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
			</div>
			<br class="clr"/>
			<div class="tab-content">
				<div class="tab-pane" id="listView">
				@foreach($cateProduct as $product)
					<div class="row">
						<div class="span2">
							<img src="storage/{{$product->main_image}}" style="width:300px;height:250px;" alt=""/>
						</div>
						<div class="span4">
							<h3>New | Available</h3>
							<hr class="soft"/>
							<h5>{{$product->product_name}} </h5>
							<p>
							{{$product->description}}
							</p>
							<a class="btn btn-small pull-right" href="product_details.html">View Details</a>
							<br class="clr"/>
						</div>
						<div class="span3 alignR">
							<form class="form-horizontal qtyFrm">
								<h3> {{$product->product_price}}</h3>
								<label class="checkbox">
									<input type="checkbox">  Adds product to compair
								</label><br/>
								
								<a href="product_details.html" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
								<a href="product_details.html" class="btn btn-large"><i class="icon-zoom-in"></i></a>
								
							</form>
						</div>
					</div>
					<hr class="soft"/>
					@endforeach
					
				</div>
				<div class="tab-pane  active" id="blockView">
					<ul class="thumbnails">
						@foreach($cateProduct as $product)
							<li class="span3">
								<div class="thumbnail">
									<a href="product_details.html"><img src="storage/{{$product->main_image}}" style="width:300px;height:250px;" alt=""/></a>
									<div class="caption">
										<h5>{{$product->product_name}}</h5>
										<p>
										{{$product->brand->name}}
										</p>
										<h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">Tk.{{$product->product_price}}</a></h4>
									</div>
								</div>
							</li>
						@endforeach
						
						
					</ul>
					<hr class="soft"/>
				</div>
			</div>
			<a href="compair.html" class="btn btn-large pull-right">Compair Product</a>
			<div class="pagination">
				{{$cateProduct->appends(['sort'=>'price_lowest'])->links()}}
				
			</div>
			<br class="clr"/>
		</div>
	</div>
</div>
</div>
@endsection