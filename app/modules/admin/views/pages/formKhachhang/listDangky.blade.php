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

	@if(isset($formDK))
	{{Form::open(array('route'=>'admin_deleteform-Dangky-multi'))}}
		<div class="action-bar">
			<button class="btn btn-danger" type="submit" href="#"><span class="glyphicon glyphicon-remove"></span> Xóa chọn</button>
		</div>	<!-- end action-bar-->

		<div class="searchTable">
			<label>Search <input type="text" id="filter" /> </label>
		</div>
		<div id="content-ajax">
			<table  width="100%" class="table tablesorter" data-page-size="13"  id="table" data-filter="#filter" data-filter-text-only="true">
	            <thead>
	                <tr>
	                    <th width="2%" data-sort-ignore="true"><input type="checkbox" class="selecctall" /></th>
	                    <th width="15%">Họ và tên Khách hàng</th>
	                    <th>Email</th>
	                    <th data-sort-ignore="true">Số điện thoại</th>
	                    <th data-sort-ignore="true" width="20%" style="text-align:center">Nội dung</th>
	                    <th data-sort-ignore="true" width="20%" style="text-align:center">Đăng ký Đào tạo</th>
	                </tr>
	            </thead>

	            <tbody id="dulieu" >
		            	@foreach($formDK as $item)
		                <tr>
		                    <td><input type="checkbox" name="iddangky[]" class="checkboxed" value="{{$item->id}}"> </td>
		                    <td><a href="{{URL::route('admin_getFormDangkyTheoID',array($item->id))}}" class="tieude">{{$item->hoten}}</a></td>
		                    <td>{{$item->email}}</td>
		                    <td>{{$item->dienthoai}}</td>
		                    <td align="center">{{Str::words($item->noidung,10)}}</td>
		                    <?php
		                    	$chuongtrinh =\Danhmuc::find($item->chuongtrinhdaotao)->tieude;
		                    ?>
		                    <td align="center">{{$chuongtrinh}}</td>
		                </tr>
		                @endforeach
	            </tbody>
	            <tfoot>
					<tr>
						<td colspan="5" align="center">
							<ul class="pagination pagination-centered hide-if-no-paging"></ul>
						</td>
					</tr>
	            </tfoot>
	        </table>
		</div>
	{{Form::close()}}
	@else
		<h2>Hiện chưa có dữ liệu</h2>
	@endif


@stop

@section('data_code')

@stop