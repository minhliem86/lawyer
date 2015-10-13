@extends('admin::layouts.layout')
@section('lang_bar')
	<li><a href="#" alt="vn" class="active">VN</a></li>
	<!-- <li><a href="#" alt="en">EN</a></li> -->
@stop
@section('content')
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
	
	
	{{Form::open(array('route'=>'post_CreateUser','class'=>'formAdmin form-horizontal'))}}
		<div class="type_lang" id="vn">
			<div class="form-group">
				<label for="" class="col-sm-2">Username</label>
				<div class="col-sm-5">
					{{Form::text('username',Input::old('username'),array('class'=>'form-control'))}}
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-2">Email</label>
				<div class="col-sm-5">
					{{Form::email('email',Input::old('email'),array('class'=>'form-control'))}}
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-2">Password</label>
				<div class="col-sm-5">
					{{Form::password('password',array('class'=>'form-control'))}}
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-2">Confirmed Password</label>
				<div class="col-sm-5">
					{{Form::password('confirmed_password',array('class'=>'form-control'))}}
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-2">Họ của bạn</label>
				<div class="col-sm-5">
					{{Form::text('first_name',Input::old('first_name'),array('class'=>'form-control'))}}
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-2">Tên của bạn</label>
				<div class="col-sm-5">
					{{Form::text('last_name',Input::old('last_name'),array('class'=>'form-control'))}}
				</div>
			</div>
			
			<div class="form-group">
				<label for="" class="col-sm-2">Phân quyền User</label>
				<div class="col-sm-5">
					<p><input type="radio" name="permission" value="1" checked/> Admin </p>
					<p><input type="radio" name="permission" value="0" /> User </p>
				</div>
			</div>
			
			<div class="form-group">	
				<div class="col-sm-10 col-sm-offset-2">
					{{Form::submit('Lưu',array('class'=>'btn btn-primary'))}}
				</div>
			</div>
		</div>	<!-- end type lang -->

		
	{{Form::close()}}
	
	
@stop

@section('data_code')
	
@stop