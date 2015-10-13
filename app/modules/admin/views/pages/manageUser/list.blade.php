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
	
	@if(isset($user))
	{{Form::open(array('route'=>'deleteAllManagUser'))}}
		<div class="action-bar">
			<a class="btn btn-primary" href="{{URL::route('get_CreateUser')}}"><span class="glyphicon glyphicon-plus"></span> Thêm</a>
			<button class="btn btn-danger" type="submit" href="#"><span class="glyphicon glyphicon-remove"></span> Xóa chọn</button>
		</div>	<!-- end action-bar-->
		<div class="searchTable">
			<label>Search <input type="text" id="filter" /> </label>										
		</div>
		<table  width="100%" class="table tablesorter" data-page-size="5"  id="table" data-filter="#filter" data-filter-text-only="true">
            <thead>
                <tr>
                    <th width="2%" data-sort-ignore="true"><input type="checkbox" class="selecctall" /></th>
                    <th width="7%" data-type="numeric" data-sort-initial="true">ID</th>
                    <th width="25%">Username</th>
                    <th >Email</th>
                    <th >Full name</th>
                    <th >Permission</th>
                    <th data-sort-ignore="true" width="15%">Thao tác</th>
                </tr>
            </thead>

            <tbody>
            	@if($user->count()!=0)
	            	@foreach($user as $item)
	                
	                <tr>
	                    <td><input type="checkbox" name="iduser[]" class="checkboxed" value="{{$item->id}}"> </td>
	                    <td>{{$item->id}}</td>
	                    <td><a href="{{URL::route('get_editManagUser',array($item->id))}}" class="tieude">{{$item->username}}</a></td>
	                    <td> {{$item->email}}</td>
	                    <td> {{$item->last_name}} {{$item->first_name}}</td>
	                    <td>{{($item->hasAccess('admin') ? 'Admin' : 'User')}}</td>
	                    <td>
	                    	<a href="{{URL::route('get_editManagUser',array($item->id))}}"><span class="glyphicon glyphicon-edit"></span> Chỉnh sửa</a> -
							<a href="{{URL::route('ResetPassword',array($item->id))}}"><span class="glyphicon glyphicon-refresh"></span> Reset password</a>
	                    </td>
	                </tr>
	                
	                @endforeach
	            @else
	            	<tr>
						<td>Chưa có thông tin tuyển dụng</td>
	            	</tr>
	            @endif
                
            </tbody>
            <tfoot>
				<tr>
					<td colspan="7" align="center">
						<ul class="pagination pagination-centered hide-if-no-paging"></ul>
					</td>
				</tr>
            </tfoot>
        </table>
	{{Form::close()}}
	@else
		<h2>Hiện chưa có dữ liệu</h2>
	@endif
@stop

@section('data_code')
	<!-- SCRIPT -->
	{{HTML::script('public/backend/js/tablePlugin/footable.js')}}
	{{HTML::script('public/backend/js/tablePlugin/footable.paginate.js')}}
	{{HTML::script('public/backend/js/tablePlugin/footable.sort.js')}}
	{{HTML::script('public/backend/js/tablePlugin/footable.filter.min.js')}}
	<script type="text/javascript">
		$(document).ready(function(){
		    //SELECT ALL
		    $('.selecctall').click(function(event) {  //on click 
		        if(this.checked) { // check select status
		            $('.checkboxed').each(function() { //loop through each checkbox
		                this.checked = true;  //select all checkboxes with class "checkbox1"               
		            });
		        }else{
		            $('.checkboxed').each(function() { //loop through each checkbox
		                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
		            });         
		        }
		    });

		    //TABLE FOO
		    $('table').footable();
		})
	</script>
@stop