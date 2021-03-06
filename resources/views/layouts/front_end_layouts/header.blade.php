<?php 
use App\Models\section;
use App\Models\Cart;
$sections = section::sections();
$totalcartItems = Cart::totalCartItems();
?>
<div id="header">
	<div class="container">
		<div id="welcomeLine" class="row">
			<div class="span6">Welcome!<strong> User</strong></div>
			<div class="span6">
				<div class="pull-right">
					<a href="/cart"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i>  <span class="sumCartProduct">{{$totalcartItems}} Item(s) </span> Items in your cart </span> </a>
				</div>
			</div>
		</div>
		<!-- Navbar ================================================== -->
		<section id="navbar">
		  <div class="navbar">
		    <div class="navbar-inner">
		      <div class="container">
		        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
		          <span class="icon-bar"></span>
		          <span class="icon-bar"></span>
		          <span class="icon-bar"></span>
		        </a>
		        <a class="brand" href="#">Stack Developers</a>
		        <div class="nav-collapse">
		          <ul class="nav">
		            <li class="active"><a href="/">Home</a></li>
					@foreach($sections as $section)
						@if(count($section['categories'])>0)
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{$section['name']}} <b class="caret"></b></a>
								<ul class="dropdown-menu">
									@foreach($section['categories'] as $category)
										<li class="divider"></li>
										<li class="nav-header"><a href="/{{$category['url']}}">{{$category['category_name']}}</a></li>
										@foreach($category['subcategories'] as $subCategory)
											<li><a href="/{{$subCategory['url']}}">&nbsp;&nbsp;&nbsp;&nbsp;{{$subCategory['category_name']}}</a></li>
										@endforeach
									@endforeach
								</ul>
							</li>
						@endif
					@endforeach
		           
		            <li><a href="#">About</a></li>
		          </ul>
		          <form class="navbar-search pull-left" action="#">
		            <input type="text" class="search-query span2" placeholder="Search"/>
		          </form>
				  <ul class="nav pull-right">
				  @if(Auth::check())
		         
		            <li><a href="#">Account</a></li>
		            <li class="divider-vertical"></li>
		            <li><a href="/logout">logout</a></li>
		         
				  @else
				  <li><a href="#">Regester</a></li>
		            <li class="divider-vertical"></li>
		            <li><a href="/login">login</a></li>
		         @endif
				  </ul>
		        </div><!-- /.nav-collapse -->
		      </div>
		    </div><!-- /navbar-inner -->
		  </div><!-- /navbar -->
		</section>
	</div>
</div>
