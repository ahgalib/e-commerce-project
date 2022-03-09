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
				<input type="hidden" name="url" id="url" value="{{$url}}">
				<div class="control-group">
					<label class="control-label alignL">Sort By </label>
					<select name="sort" id="sort">
						<option value="">select</option>
						<option value="product_latest" @if(isset($_GET['sort']) && $_GET['sort']=='product_latest') selected @endif>Latest Product</option>
						<option value="product_a_z" @if(isset($_GET['sort']) && $_GET['sort']=='product_a_z') selected @endif>Priduct name A - Z</option>
						<option value="product_z_a" @if(isset($_GET['sort']) && $_GET['sort']=='product_z_a') selected @endif>Priduct name Z - A</option>
						<option value="product_price_highest_lowest" @if(isset($_GET['sort']) && $_GET['sort']=='product_price_highest_lowest') selected @endif>Highest first</option>
						<option value="product_price_lowest_highest"@if(isset($_GET['sort']) && $_GET['sort']=='product_price_lowest_highest') selected @endif>Lowest first</option>
					</select>
				</div>
			</form>
			<br class="clr"/>

			@include('font_end.product_listing');
			
			<a href="compair.html" class="btn btn-large pull-right">Compair Product</a>
			<div class="pagination">
				@if(isset($_GET['sort']) && !empty($_GET['sort']))
					{{$cateProduct->appends(['sort'=>$_GET['sort']])->links()}}
				@else
					{{$cateProduct->links()}}
				@endif
			</div>
			<br class="clr"/>
		</div>
	</div>
</div>
</div>
@endsection