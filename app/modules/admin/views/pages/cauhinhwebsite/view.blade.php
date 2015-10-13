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

	{{Form::model($meta,array('route'=>'admin_postMeta','class'=>'formAdmin form-horizontal'))}}
	<div class="type_lang" id="vn">
		@if(isset($meta))
		<div class="form-group">
			<label for="" class="col-sm-4">Meta descriptions</label>
			<div class="col-sm-8">
				{{Form::text('meta_description',\Input::old('meta_description'),array('class'=>'form-control'))}}
			</div>
		</div>
		<div class="form-group">
			<label for="" class="col-sm-4">Meta Keyword <p><small>(space ,)</small></p></label>
			<div class="col-sm-8">
				{{Form::text('meta_keyword',\Input::old('meta_keyword'),array('class'=>'form-control'))}}
			</div>
		</div>
		<div class="form-group">
			<label for="" class="col-sm-4">Email get information</label>
			<div class="col-sm-8">
				{{Form::text('email_nhanthongtin',\Input::old('email_nhanthongtin'),array('class'=>'form-control'))}}
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-8 col-sm-offset-4">
				{{Form::submit('Confirm',array('class'=>'btn btn-primary'))}}
			</div>
		</div>
	</div>
	{{Form::close()}}
		@else
			<h2>Hiện chưa có dữ liệu</h2>
		@endif
@stop




@section('data_code')

@stop