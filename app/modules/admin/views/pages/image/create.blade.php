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


	{{Form::open(array('route'=>'admin_postImageAdd','class'=>'formAdmin form-horizontal','files'=>true))}}
		
		<div class="type_lang" id="en">
			<div class="form-group">
				<label for="" class="col-sm-2">Album</label>
				<div class="col-sm-5">
					{{Form::select('album_id',$album,'',array('class'=>'form-control'))}}
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-10 col-sm-offset-2">
					<button class="btn btn-info" type="button" onclick="openKCFinder()">Choose image</button>
                				<div id="preview_img"></div>
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
<script>
	function remove_file(value){
		$('li.img_group').remove(value);
	}

	function openKCFinder() {
		window.KCFinder = {
		    callBackMultiple: function(files) {
		        window.KCFinder = null;
		        var div = document.getElementById("preview_img");
		        for (var i = 0; i < files.length; i++){
		        		var li = document.createElement('li');
		        		li.setAttribute('class','img_group');
		        		li.setAttribute('id','img_group_'+i);
		        		var img = document.createElement('img');
		        		img.src= files[i];
		        		img.setAttribute('width','100%');
		        		li.appendChild(img);

		        		var btn_remove = document.createElement('span');
		        		btn_remove.setAttribute('class', 'remove_btn');
		        		btn_remove.setAttribute('onclick', 'remove_file("#img_group_'+i+' ")');
		        		
		        		var img_remove = document.createElement('img');
		        		img_remove.setAttribute('title', 'Remove file');
		        		img_remove.src="{{asset('public')}}/backend/images/Remove.png";
		        		btn_remove.appendChild(img_remove); 
		        	
				var elem = document.createElement("input");
				elem.type = "hidden";
				elem.setAttribute('class','img_group_input');
				elem.setAttribute('name','img[]');
				elem.value = files[i];

				var title = document.createElement("input");
				title.type="text";
				title.name = "title[]";
				title.setAttribute('class','form-control');


				li.appendChild(elem);

				li.appendChild(btn_remove);

				li.appendChild(title);
				div.appendChild(li);

		        }
		}
		}
		window.open('{{asset("public")}}/backend/js/kcfinder/browse.php?type=images&dir=../../upload/album', 'kcfinder_multiple', 'status=0, toolbar=0, location=0, menubar=0, ' + 'directories=0, resizable=1, scrollbars=0, width=800, height=600'
		);
	}

</script>
@stop