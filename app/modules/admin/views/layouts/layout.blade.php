<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-language" content="vi" />
	<meta name="description" content""/>
	<meta name="keywords" content="" />
	<title>Internal</title>
	{{HTML::style('public/backend/css/bootstrap.css')}}
	{{HTML::style('public/backend/css/bootstrap.css.map')}}
	{{HTML::style('public/backend/js/tablePlugin/footable.core.css')}}
	{{HTML::style('public/backend/css/style.css')}}

	{{HTML::script('public/backend/js/jquery-1.9.1.min.js')}}
	<script type="text/javascript" src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	{{HTML::script('public/backend/js/bootstrap.min.js')}}
	{{HTML::script('public/backend/js/tablePlugin/footable.js')}}
	{{HTML::script('public/backend/js/tablePlugin/footable.js')}}
	{{HTML::script('public/backend/js/ckeditor-full/ckeditor.js')}}

	{{HTML::script('public/backend/js/backend.js')}}

</head>
<body>
	<div class="container-fluid" style="min-width:480px;">
		@include('admin::layouts.header')
		<div class="container-fluid">
			<div class="row" >
				@include('admin::layouts.sidebar')
				<div class="col-xs-9 col-sm-10" id="content">
					<!-- CONTENT -->
					<ul id="tab-page">
						
						@yield('lang_bar')
					</ul>

					<div class="noidung">
						<div class="wrap-inner clearfix">
							@yield('content')
						</div>	<!-- end wrap-inner-->
					</div> <!-- end noidung -->

					@include('admin::layouts.footer')
				</div>	<!-- end content -->
			</div>
		</div>
	</div>	<!-- end wrapper -->
	@yield('data_code')
</body>
</html>