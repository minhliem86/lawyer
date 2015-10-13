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

	
		{{Form::open(array('route'=>'admin_customerDeleteAll','id'=>'form_data'))}}
		<div class="action-bar">
			<!-- <a class="btn btn-primary" href="{{URL::route('admin_addAlbum')}}"><span class="glyphicon glyphicon-plus"></span> Add New</a> -->
			<!-- <button class="btn btn-danger" type="button" onclick="Xoa()"><span class="glyphicon glyphicon-remove"></span> Remove Selected</button> -->
		</div>	<!-- end action-bar-->
		@if(!empty($customer))
		<div class="searchTable">
			<label>Search <input type="text" id="filter" /> </label>
		</div>
		<div id="content-ajax">
			<table  width="100%" class="table tablesorter" data-page-size="13"  id="table" data-filter="#filter" data-filter-text-only="true">
	            <thead>
	                <tr>
	                    <th width="2%" data-sort-ignore="true"><input type="checkbox" class="selecctall" /></th>
	                    <th width="15%">Customer's name</th>
	                    <th  data-sort-ignore="true">Phone</th>
	                    <th  data-sort-ignore="true">Email</th>
	                    <th data-sort-ignore="true" width="20%">Act</th>
	                </tr>
	            </thead>

	            <tbody id="dulieu" >
		            	@foreach($customer as $item)
		                <tr>
		                    <td><input type="checkbox" name="iddata[]" class="checkboxed" value="{{$item->id}}"></td>
		                    <td><b>{{$item->fullname}}</b></td>
		                    <td><b>{{$item->phone}}</b></td>
		                    <td><b>{{$item->email}}</b></td>
		                    
		                    <td> <a href="javascript:avoid();" onclick="alertDelete({{$item->id}})" ><span class="glyphicon glyphicon-remove"></span> Remove </a> - <a href="{{URL::route('admin.customer.show',$item->id)}}" ><span class="glyphicon glyphicon-eye-open"></span> View Detail </a></td>
		                </tr>
		                @endforeach
	            </tbody>
	            <tfoot>
			<tr>
				<td colspan="7" align="center">
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
		function alertDelete(id){
			var url = "{{URL::route('admin_customerDelete',array(':id'))}}";
			url =url.replace(':id',id);
			if(confirm('Are you sure want to delete this item?')){
				window.location.href=url;
			}
		}
	</script>
	<script type="text/javascript">
			// AJAX AN HIEN
		function Xoa(){
			if(confirm('Are you sure?')){
				document.forms['form_data'].submit();
			}
		}

	</script>

@stop