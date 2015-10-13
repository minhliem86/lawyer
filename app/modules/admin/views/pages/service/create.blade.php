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


	{{Form::open(array('route'=>'admin.service.store','class'=>'formAdmin form-horizontal','files'=>true))}}
		
		<div class="type_lang" id="en">
			<div class="form-group">
				<label for="" class="col-sm-2">Title</label>
				<div class="col-sm-10">
					{{Form::text('title',Input::old('title'),array('class'=>'form-control'))}}
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-2">Content</label>
				<div class="col-sm-10">
					{{Form::textarea('content',Input::old('content'),array('class'=>'form-control ckeditor'))}}
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-2">Photo</label>
				<div class="col-sm-10">
					{{Form::file('img')}}
				</div>
			</div>
		</div>
			
			<div class="form-group">
				<label for="" class="col-sm-2">Show</label>
				<div class="col-sm-10">
					{{Form::checkbox('show','1',true)}}
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-10 col-sm-offset-2">
					{{Form::submit('Save',array('class'=>'btn btn-primary'))}}
					<a href="{{URL::previous()}}" class="btn btn-primary">Back</a>
				</div>
			</div>
	{{Form::close()}}


@stop

@section('data_code')

@stop