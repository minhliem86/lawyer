<section class="share">
	<h4 class="title-share">Share</h4>
	<ul class="nav_share">
		<li><a href="{{$contact->fb_link}}" id="fb"><img src="{{asset('public/frontend')}}/images/facebook.png" height="24" width="24"></a></li>
		<li><a href="{{$contact->youtube_link}}" id="twit"><img src="{{asset('public/frontend')}}/images/twitter.png" height="24" width="24"></a></li>
		<li><a href="{{$contact->tw_link}}" id="you"><img src="{{asset('public/frontend')}}/images/youtube.png" height="24" width="24"></a></li>
	</ul>
</section>
<div class="container-fluid">
		<div class="row">
			<section class="top_header">
				<div class="container">
					<div class="row">
						<div class="col-sm-6">
							<p class="contact">Contact us: {{$contact->phone}}</p>
						</div>
					</div>
				</div>
			</section>

			<div class="container">
				<div class="row">
					<header>
						<h1 class="logo">
							<a href="{{URL::to('/')}}"><img src="{{asset('public/frontend')}}/images/logo.png" class="img-responsive" alt="Logo" /></a>
						</h1>
					</header>
				</div>
			</div>

			<div class="container">
				<div class="row">
					<div class="navbar navbar-byme">
						<div class="navbar-header">
							<h4 class="navbar-brand visible-xs" >Menu</h4>
							<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#wrap-menu" aria-expanded="false">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>

						<div class="collapse navbar-collapse" id="wrap-menu">
							<ul class="nav main-menu">
								<li class="{{Active::setActive('1','')}}"><a href="{{URL::to('/')}}">Home</a></li>
								<li class="{{Active::setActive('1','about')}}"><a href="{{URL::to('/about')}}">About Us</a></li>
								<li class="{{Active::setActive('1','service')}}"><a href="{{URL::route('user_service')}}">Services</a></li>
								<li class="{{Active::setActive('1','testimonials')}}"><a href="{{URL::route('user_testimonials')}}">Testimonial</a></li>
								<li class="{{Active::setActive('1','newsfeed')}}"><a href="{{URL::route('user_newsfeed')}}">News Feed</a></li>
								<li class="{{Active::setActive('1','contact')}}"><a href="{{URL::to('/contact')}}">Contact Us</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="container">
				<div class="row">
					<section class="banner">
						
						
						<div class="slider-wrapper theme-default">
							<div id="slider" class="nivoSlider">
								@foreach($image as $item)
								<img src="{{asset($item->urlhinh)}}" class="img-responsive" alt=""  width="980" height="300"/>
								@endforeach
							</div>
						</div>
						
					</section>
				</div>
			</div>