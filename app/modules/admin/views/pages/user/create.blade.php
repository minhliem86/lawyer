<!DOCTYPE html>
<html>
<head>
	<title>Create User</title>
</head>
<body class="create_user">

	@if(Session::has('error'))
		<div class="alert alert-danger" role="alert">{{Session::get('error')}}</div>
		<script type="text/javascript">
			$('.alert').delay(2000).fadeOut();
		</script>
	@endif
	@if(Session::has('success'))
		<div class="alert alert-success" role="alert">{{Session::get('success')}}</div>
		<script type="text/javascript">
			$('.alert').delay(2000).fadeOut();
		</script>
	@endif

	{{Form::open(array('route'=>'admin_post_createUser','class'=>'formCreateUser'))}}
		<fieldset>
			<legend>	
				Create New User
			</legend>
			<div class="form-group">
				<label for="username">Username</label>
				<input	type="text" name="username" value="{{Input::old('username')}}" class="form-control" />
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input	type="password" name="password" class="form-control" id="password" />
			</div>
			<div class="form-group">
				<label for="password">Confirm Password</label>
				<input	type="password" name="confirmed_password" class="form-control" />
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input	type="email" name="email" value="{{Input::old('email')}}" class="form-control" />
			</div>
			<div class="form-group">
				<label for="hoten">Fullname</label>
				<input	type="text" name="hoten" value="{{Input::old('hoten')}}" class="form-control" />
			</div>
			<div class="form-group">
				<label for="dienthoai">Phone Number</label>
				<input	type="text" name="dienthoai" value="{{Input::old('dienthoai')}}" class="form-control" />
			</div>
			<div class="form-group">
				<label for="diachi">Address</label>
				<input	type="text" name="diachi" value="{{Input::old('diachi')}}" class="form-control" />
			</div>
			<div class="form-group">
				<label for="level">Level</label>
				<p><span class="note"><input type="radio" name="level" value="1" /> Admin</span> <span class="note"> <input type="radio" name="level" value="2" checked /> User</span></p>
			</div>
			<div class="form-group btn_wrap">
				<input type="submit" name="submit" value="Create Account" class="btn btn-primary"/>
			</div>
		</fieldset>
		
		
	{{Form::close()}}

	{{HTML::style('public/backend/css/bootstrap.css')}}
	{{HTML::style('public/backend/css/bootstrap.css.map')}}
	{{HTML::style('public/backend/css/style.css')}}
	{{HTML::script('public/backend/js/jquery-1.9.1.min.js')}}
	{{HTML::script('public/backend/js/jquery.validate.js')}}
	<script type="text/javascript">
		$(document).ready(function(){
			$(".formCreateUser").validate({
				errorElement: "span",
				rules:{
					username: "required",
					password: "required",
					confirmed_password: {equalTo:"#password"},
					hoten: "required",
				},
			})
		})
	</script>

</body>
</html>

