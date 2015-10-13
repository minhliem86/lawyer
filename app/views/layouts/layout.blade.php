<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="{{$meta->meta_description}}"/>
	<meta name="keywords" content="{{$meta->meta_keyword}}" />

	{{HTML::style('public/frontend/css/bootstrap.css')}}
	{{HTML::style('public/frontend/css/bootstrap.css.map')}}

	{{HTML::style('public/frontend/js/nivo/themes/default/default.css')}}
	{{HTML::style('public/frontend/js/nivo/nivo-slider.css')}}
	{{HTML::style('public/frontend/css/style.css')}}
	
	
	<title>Laywer</title>
</head>
<body>
	@include('layouts.header')
		<div class="container">
			<div class="row">
				@yield('content')
			</div>
		</div>
	@include('layouts.footer')

	{{HTML::script('public/frontend/js/jquery-1.11.2.min.js')}}
	{{HTML::script('public/frontend/js/bootstrap.min.js')}}
	{{HTML::script('public/frontend/js/nivo/jquery.nivo.slider.js')}}
	<script>
		$(document).ready(function(){
			$('#slider').nivoSlider({
				controlNav: false
			});
		})
	</script>
	@yield('script')
</body>
</html>