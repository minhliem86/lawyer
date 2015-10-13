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

	
		{{Form::open(array('route'=>'admin_DeleteAlbum','id'=>'form_data'))}}
		<!-- <div class="action-bar">
			<a class="btn btn-primary" href="{{URL::route('admin_getImageAdd')}}"><span class="glyphicon glyphicon-plus"></span> Add New</a>
			<button class="btn btn-danger" type="button" onclick="Xoa()"><span class="glyphicon glyphicon-remove"></span> Remove Selected</button>
		</div>	<!-- end action-bar-->
		@if(!empty($image))
			<div class="form-group">
				<button class="btn btn-primary" onclick="openKCFinder(this);">Choose images</button>
				<ul id="list_image">
					
				</ul>
			</div>

			<div class="form-group">
				<label for="" class="col-sm-2">Album</label>
				<div class="col-sm-10">
					{{Form::select('album_id',$album,$album_id)}}
				</div>
			</div>

			<div class="form-group">
				<label for="" class="col-sm-2">show</label>
				<div class="col-sm-10">
					{{Form::checkbox('show','1',true)}}
				</div>
			</div>
		
		@else
			<div class="form-group">
				<button class="btn btn-primary" onclick="openKCFinder(this);">Choose images</button>
				<ul id="list_image">
					<li><input type="text"></li>
				</ul>
			</div>

			<div class="form-group">
				<label for="" class="col-sm-2">Album</label>
				<div class="col-sm-10">
					{{Form::select('album_id',$album,$album_id)}}
				</div>
			</div>

			<div class="form-group">
				<label for="" class="col-sm-2">show</label>
				<div class="col-sm-10">
					{{Form::checkbox('show','1',true)}}
				</div>
			</div>
		@endif
		{{Form::close()}}

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
			var url = "{{URL::route('admin_deleteAlbum',array(':id'))}}";
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
		    			url : '{{URL::route("admin_AjaxAlbum")}}',
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
		    			url : '{{URL::route("admin_AjaxAlbum")}}',
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
			if(confirm('Are you sure?')){
				document.forms['form_data'].submit();
			}
		}

		function openKCFinder(input) {
		    window.KCFinder = {
		        callBackMultiple: function(files) {
		            window.KCFinder = null;
		            // input.value = "";
		            var ul = document.getElementById('list_image');

		            for (var i = 0; i < files.length; i++)
		                ul.appendChild('asdas');
		        }
		    };
		    window.open('{{asset("public")}}/backend/js/kcfinder/browse.php?type=images&dir=../../upload/album',
		        'kcfinder_multiple', 'status=0, toolbar=0, location=0, menubar=0, ' +
		        'directories=0, resizable=1, scrollbars=0, width=800, height=600'
		    );
		}
	</script>

@stop