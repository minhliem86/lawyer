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

	
		{{Form::open(array('route'=>'admin_postImageDeleteAll','id'=>'form_data'))}}
		 <div class="action-bar">
			<a class="btn btn-primary" href="{{URL::route('admin_getImageAdd')}}"><span class="glyphicon glyphicon-plus"></span> Add New</a>
			<button class="btn btn-danger" type="button" onclick="Xoa()"><span class="glyphicon glyphicon-remove"></span> Remove Selected</button>
		</div>	<!-- end action-bar -->
		<ul class="nav nav-tabs">
			@foreach($album as $item_album)
			<li class="{{\Active::setActive('3',$item_album->slug)}}"><a href="{{URL::route('admin_image_album',$item_album->slug)}}">{{$item_album->title}}</a></li>
			@endforeach
		</ul>
		@if(!empty($image))
		<div class="searchTable">
			<label>Search <input type="text" id="filter" /> </label>
		</div>
		<div id="content-ajax">
			<table  width="100%" class="table tablesorter" data-page-size="10"  id="table" data-filter="#filter" data-filter-text-only="true">
	            <thead>
	                <tr>
	                    <th width="2%" data-sort-ignore="true"><input type="checkbox" class="selecctall" /></th>
	                    <th width="15%">Title</th>
	                    <th data-sort-ignore="true">Image</th>
	                    <th data-sort-ignore="true">Album</th>
	                    <th data-sort-ignore="true" width="20%" style="text-align:center">Show</th>
	                    <th data-sort-ignore="true" width="15%">Act</th>
	                </tr>
	            </thead>

	            <tbody id="dulieu" >
		            	@foreach($image as $item)
		                <tr>
		                    <td><input type="checkbox" name="iddata[]" class="checkboxed" value="{{$item->id}}"> </td>
		                    <td><a href="{{URL::route('admin_getImageEdit',array('id'=>$item->id))}}" class="tieude">{{$item->title}}</a></td>
		                    <td><a href="{{URL::route('admin_getImageEdit',array('id'=>$item->id))}}" class="tieude"><img width="90" src="{{asset('')}}{{$item->urlhinh}}"></a></td>
		                    <td style="color:#11689e; font-weight:bold">{{$item->album->title}}</td>
		                    <td align="center" >
							<a href="#" class="anhien-btn">
		                    	@if($item->show == '1')
									<i class="on" idanhien="{{$item->id}}" alt="{{$item->show}}"></i>
		                    	@else
									<i class="off" idanhien="{{$item->id}}" alt="{{$item->show}}"></i>
		                    	@endif
		                    </a>
		                    </td>
		                    <td><a href="{{URL::route('admin_getImageEdit',array('id'=>$item->id))}}" ><span class="glyphicon glyphicon-edit"></span> Edit</a> - <a href="javascript:avoid();" onclick="alertDelete({{$item->id}})" ><span class="glyphicon glyphicon-remove"></span> Remove </a> </td>
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
			<h2>No Data</h2>
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
			var url = "{{URL::route('admin_getImageDelete',array(':id'))}}";
			url =url.replace(':id',id);
			if(confirm('Are you sure want to delete this item?')){
				window.location.href=url;
			}
		}
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			// AJAX AN HIEN
		    $(".anhien-btn").on('click',function(){
		    	var anhien = $(this).children('i').attr('alt');
	    		var idanhien = $(this).children('i').attr('idanhien');
	    		var $this = $(this);
		    	if($(this).children('i').hasClass('on')){
		    		$(this).children('i').removeClass('on');
		    		$(this).children('i').addClass('off');
		    		$.ajax({
		    			url : '{{URL::route("admin_postImageshow")}}',
		    			type: 'POST',
		    			data: {anhien: anhien, id: idanhien},
		    			success:function(data){
		    				if(data.kq = 1){
		    					$this.children('i').attr('alt','0');
		    				}
		    			}
		    		})
		    	}else{
		    		$(this).children('i').removeClass('off');
		    		$(this).children('i').addClass('on');

		    		$.ajax({
		    			url : '{{URL::route("admin_postImageshow")}}',
		    			type: 'POST',
		    			data: {anhien: anhien, id: idanhien},
		    			success:function(data){
		    				$this.children('i').attr('alt','1');
		    			}
		    		})
		    	}
		    })
		});
		function Xoa(){
			if(confirm('Are you sure? This act can not undo !!!')){
				document.forms['form_data'].submit();
			}
		}
	</script>

@stop