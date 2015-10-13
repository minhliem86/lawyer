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

	<div class="type_lang" id="vn">
		@if(isset($formDK))
		<div class="form-group clearfix">
			<label for="" class="col-sm-2">Họ và tên khách hàng</label>
			<div class="col-sm-10">
				<p><b>{{$formDK->hoten}}</b></p>
			</div>
		</div>
		<div class="form-group clearfix">
			<label for="" class="col-sm-2">Email khách hàng</label>
			<div class="col-sm-10">
				<p><b>{{$formDK->email}}</b></p>
			</div>
		</div>
		<div class="form-group clearfix">
			<label for="" class="col-sm-2">Số điện thoại khách hàng</label>
			<div class="col-sm-10">
				<p><b>{{$formDK->dienthoai}}</b></p>
			</div>
		</div>
		<div class="form-group clearfix">
			<label for="" class="col-sm-2">Nội dung liên hệ</label>
			<div class="col-sm-10">
				<p><b>{{$formDK->noidung}}</b></p>
			</div>
		</div>

		<?php 
			$chuongtrinh = \Danhmuc::find($formDK->chuongtrinhdaotao);
			$hoc = \Khoahoc::find($formDK->khoahoc)->tieude;
		?>
		<div class="form-group clearfix">
			<label for="" class="col-sm-2">Chương trình đào tạo</label>
			<div class="col-sm-10">
				<p><b>{{$chuongtrinh->tieude}}</b></p>
			</div>
		</div>
		<div class="form-group clearfix">
			<label for="" class="col-sm-2">Khóa học</label>
			<div class="col-sm-10">
				<p><b>{{$hoc}}</b></p>
			</div>
		</div>
		<div class="form-group clearfix">
			<div class="col-sm-10 col-sm-offset-2">
				<a href="{{URL::route('admin_deleteform-Dangky',array($formDK->id))}}" class="btn btn-danger">Xóa nội dung</a>
			</div>
		</div>
	</div>
		@else
			<h2>Hiện chưa có dữ liệu</h2>
		@endif
@stop




@section('data_code')

@stop