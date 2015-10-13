@extends('admin::layouts.layout')

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


	{{Form::open(array('route'=>array('postUser'),'class'=>'formAdmin form-horizontal'))}}
		<div class="type_lang" id="vn">

			<div class="form-group">
				<label for="" class="col-sm-2">Current Password</label>
				<div class="col-sm-4">
					{{Form::password('oldpass',array('class'=>'form-control'))}}
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-2">New Password</label>
				<div class="col-sm-4">
					{{Form::password('newpass',array('class'=>'form-control'))}}
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-2">Confirm New Password</label>
				<div class="col-sm-4">
					{{Form::password('confirmed_newpass',array('class'=>'form-control'))}}
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-10 col-sm-offset-2">
					{{Form::submit('Confirm',array('class'=>'btn btn-primary'))}}
					<button onclick="comeback()" class="btn btn-primary">Back</button>

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