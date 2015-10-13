@extends('layouts.layout')
@section('content')
	<section class="main_content" id="service-page-detail">
		<article class="detail-page">
			<h3 class="title">{{$testi->title}}</h3>
					
			<p class="content">{{$testi->content}}</p>
		</article>
		
		@if(count($relate) != 0)
		<section class="relate-service">
			<h3 class="title">Recent Serviecs</h3>
			<ul class="nav_service_relate">
				@foreach($relate as $item)
					<li><a href="{{URL::route('user_testimonials_slug', array($item->slug) )}}">{{$item->title}}</a></li>
				@endforeach
			</ul>
		</section>
		@endif
	</section>
@stop