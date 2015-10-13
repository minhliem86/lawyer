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


	{{Form::model($data,array('route'=>'contact.edit', 'class'=>'formAdmin form-horizontal'))}}
		<div class="form-group clearfix">
			<label for="" class="col-sm-2">Company's Phone</label>
			<div class="col-sm-10">
				{{Form::text('phone',Input::old('phone'), array('class' => 'form-control'))}}
			</div>
		</div>
		
		<div class="form-group clearfix">
			<label for="" class="col-sm-2">Company's Email</label>
			<div class="col-sm-10">
				{{Form::text('email',Input::old('email'), array('class' => 'form-control'))}}
			</div>
		</div>

		<div class="form-group clearfix">
			<label for="" class="col-sm-2">Company's Address</label>
			<div class="col-sm-10">
				{{Form::text('address',Input::old('address'), array('class' => 'form-control'))}}
			</div>
		</div>

		<div class="form-group clearfix">
			<label for="" class="col-sm-2">Facebook link</label>
			<div class="col-sm-10">
				{{Form::text('fb_link',Input::old('fb_link'), array('class' => 'form-control'))}}
			</div>
		</div>

		<div class="form-group clearfix">
			<label for="" class="col-sm-2">Youtube link</label>
			<div class="col-sm-10">
				{{Form::text('youtube_link',Input::old('youtube_link'), array('class' => 'form-control'))}}
			</div>
		</div>

		<div class="form-group clearfix">
			<label for="" class="col-sm-2">Twitter link</label>
			<div class="col-sm-10">
				{{Form::text('tw_link',Input::old('tw_link'), array('class' => 'form-control'))}}
			</div>
		</div>

		<div class="form-group clearfix">
			<label for="" class="col-sm-2">Company's Map</label>
			<div class="col-sm-10">
				{{Form::textarea('map',Input::old('map'), array('class' => 'form-control', 'rows'=>2))}}
			</div>
		</div>

		<div class="clearfix ">
			<div class="col-sm-10 col-sm-offset-2">
				{{Form::submit('Apply',array('class'=>'btn btn-primary'))}}
			<a href="{{URL::previous() }}" class="btn btn-info">Back</a>	
			</div>			
		</div>
	{{Form::close()}}


@stop

@section('data_code')

@stop