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


	{{Form::model($data, array(  'method'=>'PUT', 'files'=>true, 'route'=>array('admin.service.update',$data->id), 'class'=>'formAdmin form-horizontal'))}}
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
		<div class="form-group clearfix">
			<label for="" class="col-sm-2">Photo</label>
			<div class="col-sm-10">
				{{Form::file('img')}}
				{{Form::hidden('img_bk',$data->urlHinh)}}
				{{HTML::image($data->urlHinh,'',array('style'=>'max-width:250px'))}}
			</div>
		</div>
		<div class="form-group clearfix">
			<label for="" class="col-sm-2">Sort</label>
			<div class="col-sm-5">
				{{Form::text('order',Input::old('order'), array('class' => 'form-control'))}}
			</div>
		</div>

		<div class="form-group">
				<label for="" class="col-sm-2">Show</label>
				<div class="col-sm-10">
					@if($data->show == 1)
						Visible {{Form::radio('show','1',false)}}<br/>
						Invisible {{Form::radio('show','0',true)}}
					@else
						Visible {{Form::radio('show','1',true)}}<br/>
						Invisible {{Form::radio('show','0',false)}}
					@endif
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
