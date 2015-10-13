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


	{{Form::model($data,array('route'=>'about.edit', 'class'=>'formAdmin form-horizontal'))}}
		<div class="form-group clearfix">
			<label for="" class="col-sm-2">Slogan</label>
			<div class="col-sm-10">
				{{Form::text('slogan',Input::old('slogan'), array('class' => 'form-control'))}}
			</div>
		</div>
		<div class="form-group clearfix">
			<label for="" class="col-sm-2">Title</label>
			<div class="col-sm-10">
				{{Form::text('title',Input::old('title'), array('class' => 'form-control'))}}
			</div>
		</div>
		
		<div class="form-group clearfix">
			<label for="" class="col-sm-2">Content</label>
			<div class="col-sm-10">
				{{Form::textarea('content',Input::old('content'), array('class' => 'form-control ckeditor'))}}
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