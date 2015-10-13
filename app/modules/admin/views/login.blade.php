<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Login Page</title>

{{HTML::style('public/backend/css/screen.css')}}
<!--  jquery core -->
{{HTML::script('public/backend/js/jquery-1.9.1.min.js')}}

<!-- Custom jquery scripts -->
{{HTML::script('public/backend/js/custom_jquery.js')}}

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
{{HTML::script('public/backend/js/jquery.pngFix.pack.js')}}
<script type="text/javascript">
$(document).ready(function(){
	$(document).pngFix( );
});
</script>
</head>
<body id="login-bg">

<!-- Start: login-holder -->
<div id="login-holder">
	
	<!-- start logo -->
	<!-- <div id="logo-login">
		<a href="{{URL::to('/')}}" target="_blank"><img src="{{URL::to('public/backend/images/logo-admin.png')}}" class="img-responsive" alt="" /></a>
	</div> -->
	<!-- end logo -->

	<div class="clear"></div>

	<!--  start loginbox ................................................................................. -->
	<div id="loginbox">

		<!--  start login-inner -->
		<div id="login-inner">
			{{Form::open(array('route'=>'admin_login_post'))}}
			<table border="0" cellpadding="0" cellspacing="0">
			<tr>
				<th>Username</th>
				<td><input type="text" placeholder="username" onfocus="this.placeholder=''" onblur="this.placeholder='username'" value="{{Input::old('username')}}" name="username"  class="login-inp" /></td>
			</tr>
			<tr>
				<th>Password</th>
				<td><input type="password" placeholder="******" onfocus="this.placeholder=''" onblur="this.placeholder='username'" class="login-inp" name="password" /></td>
			</tr>
			<tr>
				<!-- <th></th>
				<td valign="top"><input type="checkbox" class="checkbox-size" id="login-check" name="remember" /><label for="login-check">Remember me</label></td> -->
			</tr>
			<tr>
				<th></th>
				<td><input type="submit" class="submit-login"  /></td>
			</tr>
			</table>
			{{Form::close()}}
			@if(Session::has('error'))
				<p class="error" style="color:white">{{Session::get('error')}}</p>
				<script type="text/javascript">
					$('.error').delay(2000).fadeOut();
				</script>
			@endif
			@if(Session::has('success'))
				<p class="success" style="color:#f2f2f2">{{Session::get('success')}}</p>
				<script type="text/javascript">
					$('.error').delay(2000).fadeOut();
				</script>
			@endif
		</div>
	 	<!--  end login-inner -->
		<div class="clear"></div>
		<a href="" class="forgot-pwd">Forgot Password?</a>
		
	 </div>

 <!--  end loginbox -->

	<!--  start forgotbox ................................................................................... -->
	<div id="forgotbox">
		<div id="forgotbox-text">Please send us your email and we'll reset your password.</div>
		<!--  start forgot-inner -->
		<div id="forgot-inner">
		{{Form::open(array('route'=>'post_forgetPassword'))}}
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th>Email address:</th>
			<td><input type="text" value="" name="username"  class="login-inp" /></td>
		</tr>
		<tr>
			<th> </th>
			<td><input type="submit" class="submit-login"  /></td>
		</tr>
		</table>
		{{Form::close()}}
		</div>
		<!--  end forgot-inner -->
		<div class="clear"></div>
		<a href="{{URL::to('admin/login')}}" class="back-login">Back to login</a>
	</div>
	<!--  end forgotbox -->

</div>
<!-- End: login-holder -->
</body>
</html>