@extends('layouts.front_end_layouts.frontLayout') 
  @section('content') 
<!-- Sidebar end=============================================== -->
	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active">Login</li>
    </ul>
	<h3> Login</h3>	
	<hr class="soft"/>
	
	<div class="row">
		<div class="span4">
			<div class="well">
				<h5>CREATE YOUR ACCOUNT</h5><br/>
				Enter your e-mail address to create an account.<br/><br/><br/>
				<form action="userRegister" method="post">
					@csrf
					<div class="control-group">
						<label class="control-label" for="inputEmail0">Name</label>
						<div class="controls">
						<input class="span3"  type="text" id="name"  name="name" placeholder="name">
						</div>
						<span style="color:red;">@error('name'){{$message}}@enderror</span>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputEmail0">E-mail address</label>
						<div class="controls">
						<input class="span3"  type="text" name="email" id="inputEmail0" placeholder="Email">
						</div>
						<span style="color:red;">@error('email'){{$message}}@enderror</span>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="inputEmail0">Password</label>
						<div class="controls">
						<input class="span3"  type="password" name="password" id="password" placeholder="password">
						</div>
						<span style="color:red;">@error('password'){{$message}}@enderror</span>
					</div>
					<div class="controls">
					<button type="submit" class="btn block">Create Your Account</button>
					</div>
				</form>
			</div>
		</div>
		<div class="span1"> &nbsp;</div>
		<div class="span4">
			@if(Session::get('error'))
			<div class="alert">
				{{Session::get('error')}}
			</div>
			@endif
			<div class="well">
			<h5>ALREADY REGISTERED ?</h5>
			<form action="userLogin" method="post">
				@csrf
			  <div class="control-group">
				<label class="control-label" for="inputEmail1">Email</label>
				<div class="controls">
				  <input class="span3"  type="text" name="email" id="inputEmail1" placeholder="Email">
				  <span style="color:red;">@error('email'){{$message}}@enderror</span>
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label" for="inputPassword1">Password</label>
				<div class="controls">
				  <input type="password" class="span3" name="password" id="inputPassword1" placeholder="Password">
				  <span style="color:red;">@error('password'){{$message}}@enderror</span>
				</div>
			  </div>
			  <div class="control-group">
				<div class="controls">
				  <button type="submit" class="btn">Sign in</button> <a href="forgetpass.html">Forget password?</a>
				</div>
			  </div>
			</form>
		</div>
		</div>
	</div>	
	
</div>
</div></div>
</div>
@endsection
