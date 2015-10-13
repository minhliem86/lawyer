@extends('layouts.layout')

@section('content')
	<section class="main_content" id="home-page">
		@if(count($home) != 0)
		<section class="about">
			<!-- <h3 class="title">About Us</h3> -->
			<article>
				<p>{{$home->content}}</p>
			</article>
		</section>
		@endif
		<section class="lastes_service">
			<h3 class="title">Lastest Services</h3>
			<div class="row">
				@foreach($service as $item)
				<div class="col-sm-4">
					<article class="each_service">
						<a href="{{URL::route('user_service_slug',array($item->slug))}}"><img src="{{asset($item->urlHinh)}}" class="img-responsive" alt=""  /></a>
						<h3 class="title_each"><a href="{{URL::route('user_service_slug',array($item->slug))}}">{{$item->title}}</a></h3>
						<p class="sum_each">{{Str::words($item->content,15)}}</p>
					</article>
				</div>
				@endforeach
				
			</div>
		</section>
		<section class="slogan">
			<h3 class="slogan-title">{{$about->slogan}}</h3>
		</section>
	</section>
@stop