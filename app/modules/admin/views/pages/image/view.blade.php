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


	{{Form::model($image,array('route'=>array('admin_postImageEdit',$image->id),'class'=>'formAdmin form-horizontal','files'=>true))}}
		
		<div class="type_lang" id="en">
			<div class="form-group">
				<label for="" class="col-sm-2">Album</label>
				<div class="col-sm-5">
					{{Form::select('album_id',$album,$image->album->id,array('class'=>'form-control'))}}
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-2">Title</label>
				<div class="col-sm-5">
					{{Form::text('title',Input::old('title'),array('class'=>'form-control'))}}
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-10 col-sm-offset-2">
					<button class="btn btn-info" type="button" onclick="openKCFinder()">Choose image</button>
                	<div id="preview_img" >
                		<img src="{{asset('')}}{{$image->urlhinh}}" alt="" width="320">
                		<input type="hidden" name="file_bk" value="{{$image->urlhinh}}" />
                	</div>
				</div>
                
            </div>
		</div>
			<div class="form-group">
				<label for="" class="col-sm-2">Sort</label>
				<div class="col-sm-2">
					{{Form::text('sort',Input::old('sort'),array('class'=>'form-control'))}}
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-2">Show</label>
				<div class="col-sm-10">
					@if($image->show == 1)
						Yes {{Form::radio('show','1',false)}}
						No {{Form::radio('show','0',true)}}
					@else
						Yes {{Form::radio('show','1',true)}}
						No {{Form::radio('show','0',false)}}
					@endif
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
	function openKCFinder() {
	    window.KCFinder = {
	        callBack: function(url) {
	            window.KCFinder = null;
	            var div = document.getElementById("preview_img");
	            div.innerHTML = '<div style="margin:5px">Loading...</div>';
	            var img = new Image();
	            img.src = url;
	            img.onload = function() {
	                div.innerHTML = '<img id="img" width="320" src="' + url + '" />' + '<input type="hidden" name="file" value="' + url+ '" />';
	                var img = document.getElementById('img');
	                var o_w = img.offsetWidth;
	                var o_h = img.offsetHeight;
	                var f_w = div.offsetWidth;
	                var f_h = div.offsetHeight;
	                if ((o_w > f_w) || (o_h > f_h)) {
	                    if ((f_w / f_h) > (o_w / o_h))
	                        f_w = parseInt((o_w * f_h) / o_h);
	                    else if ((f_w / f_h) < (o_w / o_h))
	                        f_h = parseInt((o_h * f_w) / o_w);
	                    img.style.width = f_w + "px";
	                    img.style.height = f_h + "px";
	                } else {
	                    f_w = o_w;
	                    f_h = o_h;
	                }
	                // img.style.marginLeft = parseInt((div.offsetWidth - f_w) / 2) + 'px';
	                // img.style.marginTop = parseInt((div.offsetHeight - f_h) / 2) + 'px';
	                img.style.visibility = "visible";
	            }
	        }
	    };
	    window.open('{{asset("public")}}/backend/js/kcfinder/browse.php?type=images&dir=../../upload/images',
	        'kcfinder_image', 'status=0, toolbar=0, location=0, menubar=0, ' +
	        'directories=0, resizable=1, scrollbars=0, width=800, height=600'
	    );
	}
</script>
@stop