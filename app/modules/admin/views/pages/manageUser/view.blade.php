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
	
	
	{{Form::model($user,array('route'=>array('post_editManagUser',$user->id),'class'=>'formAdmin form-horizontal'))}}
		<div class="type_lang" id="vn">
			
			<div class="form-group">
				<label for="" class="col-sm-2">Email</label>
				<div class="col-sm-10">
					{{Form::email('email',Input::old('email'),array('class'=>'form-control'))}}
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-2">First_name</label>
				<div class="col-sm-10">
					{{Form::text('first_name',Input::old('first_name'),array('class'=>'form-control'))}}
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-2">Last_name</label>
				<div class="col-sm-10">
					{{Form::text('last_name',Input::old('last_name'),array('class'=>'form-control'))}}
				</div>
			</div>
			

			<div class="form-group">
				<label for="" class="col-sm-2">Permission</label>
				<div class="col-sm-10">
			 		<p><input type="radio" name="permission" value="1" <?php if($user->hasAccess('admin')){echo "checked='checked'" ;} ?> /> Admin </p>
					<p><input type="radio" name="permission" value="0"  <?php if($user->hasAccess('user')){echo "checked='checked'";} ?>  /> User </p>						
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-10 col-sm-offset-2">
					{{Form::submit('Lưu',array('class'=>'btn btn-primary'))}}
					<button onclick="comeback()" class="btn btn-primary">Quay lại</button>
					
				</div>
			</div>
		</div>	<!-- end type-lang-->

		

	{{Form::close()}}
	
	
@stop

@section('data_code')
	<script>
	function comeback(){
		window.history.back(-1);
	}
	</script>
@stop