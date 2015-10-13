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
		<div class="form-group clearfix">
			<label for="" class="col-sm-2">Customer's name</label>
			<div class="col-sm-10">
				<p><b>{{$customer->fullname}}</b></p>
			</div>
		</div>
			
		<div class="form-group clearfix">
			<label for="" class="col-sm-2">Customer's Phone Number</label>
			<div class="col-sm-2">
				<p>{{$customer->phone}}</p>
			</div>
		</div>
		<div class="form-group clearfix">
			<label for="" class="col-sm-2">Customer's Email</label>
			<div class="col-sm-2">
				<p>{{$customer->email}}</p>
			</div>
		</div>
		<div class="form-group clearfix">
			<label for="" class="col-sm-2">Customer's Content</label>
			<div class="col-sm-2">
				<p>{{$customer->question}}</p>
			</div>
		</div>

		<div class="clearfix">
			<a href="{{URL::previous() }}" class="btn btn-info">Back</a>
		</div>
@stop

@section('data_code')

@stop